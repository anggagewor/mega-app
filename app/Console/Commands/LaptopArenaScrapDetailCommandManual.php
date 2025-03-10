<?php

namespace App\Console\Commands;

use App\Models\LaptopBrand;
use App\Models\LaptopModel;
use App\Models\LaptopModelFeature;
use App\Models\LaptopModelGallery;
use App\Models\ScrapedLaptop;
use Illuminate\Console\Command;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class LaptopArenaScrapDetailCommandManual extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:laptop-arena-scrap-detail-manual';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     * @throws TransportExceptionInterface
     */
    public function handle(): void
    {
        ini_set('memory_limit', '-1');
        $this->info('| ------------------------------------------------------------------------------');
        $this->info('| Laptop Arena Scrap Detail');
        $this->info('| v.0.0.1');
        $this->info('| ------------------------------------------------------------------------------');
        do {
            $links = ScrapedLaptop::where('status', 'pending')->orderBy('id', 'asc')->limit(1)->get();
            if ($links->isNotEmpty()) {
                foreach ($links as $link) {
                    $url = $link->url;
                    $id = $link->id;
                    $this->info('| Update progress');
                    $scrapedLaptop = ScrapedLaptop::whereId($id)->first();
                    $scrapedLaptop->status = 'processing';
                    $scrapedLaptop->last_checked = now();
                    $scrapedLaptop->save();
                    $client = HttpClient::create();
                    $this->info('| sending request to ' . $url);
                    $response = $client->request('GET', $url, [
                        'headers' => [
                            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36'
                        ]
                    ]);
                    try {
                        $this->info('| Parsing data');
                        $crawler = new Crawler($response->getContent());
                        $tables = $crawler->filter('table.specs.responsive');
                        $images = $crawler->filter('img.gallery-image')->each(function (Crawler $image) {
                            return 'https://www.laptoparena.net' . ($image->attr('data-src') ?? $image->attr('src'));
                        });
                        $datas = $tables->each(function (Crawler $tr) {
                            return $tr->filter('tr')->each(function (Crawler $td) {
                                return $td->filter('td')->each(function (Crawler $content) {
                                    return $content->text();
                                });
                            });
                        });

                        $title = $crawler->filterXPath('//div[@style="font-weight: 600;font-size: 22px; color: grey; line-height: 40px;"]');
                        $title = $title->text();

                        $filtered = array_filter($datas, function ($item) {
                            return !empty($item); // Hapus array kosong
                        });
                        $filtered = array_filter($filtered[0], function ($filter) {
                            return !empty($filter); // Hapus array kosong
                        });
                        preg_match('/\.net\/([^\/]+)/', $url, $matches);
                        $brand = $matches[1];
                        $parse = $this->parseLaptopUrl($url);
                        $this->info('Url ' . $url);
                        $brandModel = LaptopBrand::where('name', $brand)->first();

                        if ($brandModel) {
                            $laptopModel = LaptopModel::where([
                                'brand_id' => $brandModel->id,
                                'model' => $title,
                                'part_number' => $parse['part_number']
                            ])->first();
                            if (!$laptopModel) {
                                $this->info('| insert model');
                                $laptopModel = new LaptopModel;
                                $laptopModel->brand_id = $brandModel->id;
                                $laptopModel->model = $title;
                                $laptopModel->part_number = $parse['part_number'] ?? '';
                                $laptopModel->save();
                            }
                            foreach ($filtered as $filter) {
                                if (count($filter) == 2) {
                                    $feature_name = $filter[0];
                                    $feature_value = $filter[1];
                                    $feature = LaptopModelFeature::where([
                                        'laptop_model_id' => $laptopModel->id,
                                        'feature_name' => $feature_value
                                    ])->first();
                                    if (!$feature) {
                                        $this->info('| insert feature ' . $feature_name);
                                        $laptopFeature = new LaptopModelFeature;
                                        $laptopFeature->laptop_model_id = $laptopModel->id;
                                        $laptopFeature->feature_name = $feature_name;
                                        $laptopFeature->feature_value = $feature_value;
                                        $laptopFeature->save();
                                    }
                                }
                            }

                            foreach ($images as $image) {
                                $check = LaptopModelGallery::where([
                                    'laptop_model_id' => $laptopModel->id,
                                    'image_url' => $image
                                ])->first();
                                if (!$check) {
                                    $this->info('| insert image ' . $image);
                                    $laptopModelGallery = new LaptopModelGallery;
                                    $laptopModelGallery->laptop_model_id = $laptopModel->id;
                                    $laptopModelGallery->image_url = $image;
                                    $laptopModelGallery->save();
                                }
                            }

                            $this->info('| Update data');
                            $scrapedLaptop = ScrapedLaptop::whereId($id)->first();
                            $scrapedLaptop->status = 'done';
                            $scrapedLaptop->last_checked = now();
                            $scrapedLaptop->save();
//                    $this->info('| sleep 2');
//                    sleep(2);
                            $this->info('| ------------------------------------------------------------------------------');

                        }

                    } catch (ClientExceptionInterface|TransportExceptionInterface|ServerExceptionInterface|RedirectionExceptionInterface $e) {

                        $scrapedLaptop = ScrapedLaptop::whereId($id)->first();
                        $scrapedLaptop->status = 'error';
                        $scrapedLaptop->last_checked = now();
                        $scrapedLaptop->save();
                        dump($e->getMessage());
                    }
                }
            }
        } while ($links->isNotEmpty());

    }

    public function parseLaptopUrl($url): ?array
    {
        $parsed = parse_url($url);
        $segments = explode('/', trim($parsed['path'], '/'));

        if (count($segments) < 2) {
            return null;
        }

        $brand = $segments[0]; // Brand selalu di posisi pertama
        $rawModel = explode('-', $segments[1]); // Pecah model & part number

        // Hilangkan brand dari awal model
        if (strtolower($rawModel[0]) === strtolower($brand)) {
            array_shift($rawModel);
        }

        // Buat nyimpan hasil parsing
        $baseModel = [];
        $partNumber = null;

        // Loop buat pisahin model dan part number
        foreach ($rawModel as $part) {
            if (preg_match('/[0-9].*[a-zA-Z]|[a-zA-Z].*[0-9]/', $part)) {
                // Kalau ada kombinasi huruf & angka, anggap sebagai part number
                $partNumber = $part;
                break;
            }
            $baseModel[] = $part;
        }

        return [
            'brand' => $brand,
            'model_slug' => implode('-', $baseModel), // Model tanpa part number
            'part_number' => $partNumber // Bisa null kalau nggak ada
        ];
    }
}

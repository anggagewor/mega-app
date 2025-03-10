<?php

namespace App\Jobs;

use App\Models\LaptopBrand;
use App\Models\LaptopModel;
use App\Models\LaptopModelFeature;
use App\Models\LaptopModelGallery;
use App\Models\ScrapedLaptop;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Throwable;

class ScrapLaptopDetailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $scrapedLaptop;

    public function __construct(ScrapedLaptop $scrapedLaptop)
    {
        $this->scrapedLaptop = $scrapedLaptop;
    }

    /**
     * @throws Throwable
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function handle(): void
    {
        DB::beginTransaction();
        try {
            $scrapedLaptop = $this->scrapedLaptop;
            $url = $scrapedLaptop->url;
            $scrapedLaptop->update(['status' => 'processing', 'last_checked' => now()]);

            $client = HttpClient::create();
            $response = $client->request('GET', $url, [
                'headers' => [
                    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36'
                ]
            ]);

            $crawler = new Crawler($response->getContent());
            $title = $crawler->filterXPath('//div[@style="font-weight: 600;font-size: 22px; color: grey; line-height: 40px;"]')->text();
            $tables = $crawler->filter('table.specs.responsive');
            $images = $crawler->filter('img.gallery-image')->each(fn(Crawler $image) => 'https://www.laptoparena.net' . ($image->attr('data-src') ?? $image->attr('src')));
            $datas = $tables->each(fn(Crawler $tr) => $tr->filter('tr')->each(fn(Crawler $td) => $td->filter('td')->each(fn(Crawler $content) => $content->text())));

            // Filter data kosong
            $filtered = array_filter($datas, fn($item) => !empty($item));
            $filtered = array_filter($filtered[0], fn($filter) => !empty($filter));

            preg_match('/\.net\/([^\/]+)/', $url, $matches);
            $brand = $matches[1];
            $brandModel = LaptopBrand::where('name', $brand)->first();
            $parse = $this->parseLaptopUrl($url);
            if ($brandModel) {
                $laptopModel = LaptopModel::firstOrCreate(
                    ['brand_id' => $brandModel->id, 'model' => $title, 'part_number' => $parse['part_number']]
                );

                foreach ($filtered as $filter) {
                    if (count($filter) == 2) {
                        [$feature_name, $feature_value] = $filter;
                        LaptopModelFeature::firstOrCreate(
                            ['laptop_model_id' => $laptopModel->id, 'feature_name' => $feature_name],
                            ['feature_value' => $feature_value]
                        );
                    }
                }

                foreach ($images as $image) {
                    LaptopModelGallery::firstOrCreate(
                        ['laptop_model_id' => $laptopModel->id, 'image_url' => $image]
                    );
                }

                $scrapedLaptop->update(['status' => 'done', 'last_checked' => now()]);
            }
            DB::commit();
        } catch (TransportExceptionInterface $e) {
            DB::rollBack();
            $scrapedLaptop->update(['status' => 'error', 'last_checked' => now()]);
        }
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


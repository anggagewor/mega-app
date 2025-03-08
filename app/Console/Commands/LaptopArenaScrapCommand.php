<?php

namespace App\Console\Commands;

use App\Models\ScrapedLaptop;
use Illuminate\Console\Command;
use Symfony\Component\DomCrawler\Crawler;

class LaptopArenaScrapCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:laptop-arena-scrap {--brand= : brand}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $brand = $this->option('brand');
        $last_prod_nr = null;
        $step = 16;
        $first = $this->fetchData($brand, $last_prod_nr);
        $crawler = new Crawler($first);
        $links = $crawler->filter('div.product > a')->each(function (Crawler $node, $i) {
            return 'https://www.laptoparena.net' . $node->attr('href');
        });
        $last_prod_nr = $crawler->filter('span.button.load_more_products')->each(function (Crawler $node, $i) {
            $text = $node->text();
            // Ambil kedua angka dari teks
            preg_match_all('/\d+/', $text, $matches);
            if (!empty($matches[0])) {
                return (int)$matches[0][1];
            } else {
                return 0;
            }
        });
        $current = $crawler->filter('span.button.load_more_products')->each(function (Crawler $node, $i) {
            $text = $node->text();
            // Ambil kedua angka dari teks
            preg_match_all('/\d+/', $text, $matches);
            if (!empty($matches[0])) {
                return (int)$matches[0][0];
            } else {
                return 0;
            }
        });
        $unique_urls = array_values(array_unique($links));
        $data = array_map(fn($url) => ['url' => $url, 'status' => 'pending'], $unique_urls);
        ScrapedLaptop::insertOrIgnore($data);
        if (isset($current[0])) {
            do {
                $data = $this->fetchData($brand, $current);
                $crawler = new Crawler($data);
                $links = $crawler->filter('div.product > a')->each(function (Crawler $node, $i) {
                    return 'https://www.laptoparena.net' . $node->attr('href');
                });
                $last_prod_nr = $crawler->filter('span.button.load_more_products')->each(function (Crawler $node, $i) {
                    $text = $node->text();
                    // Ambil kedua angka dari teks
                    preg_match_all('/\d+/', $text, $matches);
                    if (!empty($matches[0])) {
                        return (int)$matches[0][1];
                    } else {
                        return 0;
                    }
                });
                $current = $crawler->filter('span.button.load_more_products')->each(function (Crawler $node, $i) {
                    $text = $node->text();
                    // Ambil kedua angka dari teks
                    preg_match_all('/\d+/', $text, $matches);
                    if (!empty($matches[0])) {
                        return (int)$matches[0][0];
                    } else {
                        return 0;
                    }
                });
                $unique_urls = array_values(array_unique($links));
                $data = array_map(fn($url) => ['url' => $url, 'status' => 'pending'], $unique_urls);
                ScrapedLaptop::insertOrIgnore($data);
                if (!isset($current[0])) {
                    $this->info('Stoping No Data');
                    break;
                }
                $current = $current[0] + $step;
                $this->info('handle current : ' . $current);
                $this->info('handle total data : ' . $last_prod_nr[0]);
                if ($current - $step > $last_prod_nr[0]) {
                    $this->info('$current-$step ' . $current - $step);
                    $this->info('Stoping');
                    break;
                }
                $this->info('Sleep');
                sleep(3);
            } while ($current);
        }
//        dump($first);
    }

    public function fetchData($brand, $last_prod_nr = null): false|string
    {
        $baseUrl = "https://www.laptoparena.net/include/backend_display_mode.php";
        $params = [
            "brand" => $brand
        ];
        if (is_array($last_prod_nr)) {
            $last_prod_nr = $last_prod_nr[0];
        }

        if ($last_prod_nr !== null) {
            $params["last_prod_nr"] = $last_prod_nr - 16;
        }
        $this->info("current: $last_prod_nr");
        $params["display_mode"] = "grid";

        $url = $baseUrl . "?" . http_build_query($params);
        $this->info("Fetching: $url");

        return file_get_contents($url);
    }
}

<?php

namespace App\Console\Commands;

use App\Models\Anime;
use Illuminate\Console\Command;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class MALScaper extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mal:scaper';

    protected int $maxPage = 28050;

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
        $this->info('| My Anime List Scraper');
        $this->info('| Version 0.0.1');
        $this->info('| Start');

        for ($a = 23750; $a < $this->maxPage; $a += 50) {
            $this->info('| Page: ' . $a);
            $client = HttpClient::create();
            $page = '?limit=' . $a;
            if ($a < 49) {
                $page = '';
            }
            $response = $client->request('GET', 'https://myanimelist.net/topanime.php' . $page);
            $this->info('| Url : ' . 'https://myanimelist.net/topanime.php' . $page);
            try {
                $crawler = new Crawler($response->getContent());
                $animes = $crawler->filter('table.top-ranking-table')->each(function (Crawler $node, $i) {
                    return $node->filter('tr.ranking-list')->each(function (Crawler $n, $i) {
                        return $n->each(function (Crawler $td, $i) {
                            return $td->filter('td.title.al.va-t.word-break')->each(function (Crawler $r, $i) {
                                return $r->filter('div.detail')->each(function (Crawler $detail, $i) {
                                    $title = $detail->filter('h3.anime_ranking_h3')->each(function (Crawler $h, $i) {
                                        $url = $h->filter('a.hoverinfo_trigger')->first()->attr('href');
                                        preg_match("/anime\/(\d+)/", $url, $matches);
                                        if ($matches) {
                                            return [
                                                'title' => $h->text(),
                                                'url' => $url,
                                                'mal_id' => $matches[1],
                                            ];
                                        }
                                        return [];
                                    });
                                    $det = $detail->filter('div.information')->each(function (Crawler $d, $i) {
                                        $text = $d->text();
                                        preg_match("/^(.*?) \((\d+) eps\) (\w{3} \d{4}|\d{4})?(?: - (\w{3} \d{4}|\d{4})?)? ([\d,]+) members$/", $text, $matches);
                                        if ($matches) {
                                            $type = $matches[1]; // Movie
                                            $episodes = $matches[2]; // 1, 12, 24
                                            $start_date = $matches[3] ?? "Unknown"; // Bisa "Dec 2022" atau "2022"
                                            $end_date = $matches[4] ?? "Unknown"; // Bisa "Dec 2022", "2022", atau kosong
                                            $members = str_replace(",", "", $matches[5]); // 315409 tanpa koma
                                            return [
                                                'type' => $type,
                                                'episodes' => $episodes,
                                                'start_date' => $start_date,
                                                'end_date' => $end_date,
                                                'members' => $members,
                                            ];
                                        }
                                        return [];
                                    });
                                    return array_merge($title, $det);
                                });
                            });
                        });
                    });
                });
                $datas = [];
                foreach ($animes as $key => $anime) {
                    for ($x = 0; $x < count($anime); $x++) {
                        $this->info('| Formating Data');
                        $flattened = $anime[$x][0][0][0];
                        $datas[] = [
                            "title" => $flattened[0]["title"],
                            "url" => $flattened[0]["url"],
                            "mal_id" => $flattened[0]["mal_id"],
                            "type" => $flattened[1]["type"] ?? null,
                            "episodes" => $flattened[1]["episodes"] ?? null,
                            "start_date" => $flattened[1]["start_date"] ?? null,
                            "end_date" => $flattened[1]["end_date"] ?? null,
                            "members" => $flattened[1]["members"] ?? 0,
                            "created_at" => date('Y-m-d H:i:s'),
                            "updated_at" => date('Y-m-d H:i:s'),
                        ];
                    }
                }
                $this->info('| Insert Data');
                Anime::insert($datas);
            } catch (ClientExceptionInterface|RedirectionExceptionInterface|ServerExceptionInterface|TransportExceptionInterface $e) {
                dump($e->getMessage());
            }
            $this->info('| sleep 10s');
            sleep(10);
        }
    }
}

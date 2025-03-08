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

class MALGetDetail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mal:get-detail {--id= : amine id}';

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
        $id = $this->option('id');
        $models = Anime::query();
        if ($id) {
            $models->where('id', $id);
        }
        $count = $models->count();
        $models = $models->get();
        $x = 1;
        foreach ($models as $model) {
            $this->info('| detail : ' . $model->id . ' | ' . $model->title);
            $client = HttpClient::create();
            $url = $model->url;
            $response = $client->request('GET', $url);
            try {
                $crawler = new Crawler($response->getContent());
                $images = $crawler->filter('div.leftside')->each(function (Crawler $node, $i) {
                    return $node->filter('a')->each(function (Crawler $node, $i) {
                        return $node->filter('img')->each(function (Crawler $img, $i) {
                            if ($img->attr('data-src')) {
                                return $img->attr('data-src');
                            }
                            return null;
                        });
                    });
                });
                $filter = $crawler->filter('div.spaceit_pad')->each(function (Crawler $node, $i) use ($url) {
                    preg_match("/anime\/(\d+)/", $url, $matches);
                    if ($matches) {
                        $explode = explode(':', $node->text());
                        $details = [];
                        if (count($explode) == 2) {
                            if ($explode[0] == 'Status') {
                                $details[$matches[1]]['status'] = trim($explode[1]);
                            }
                            if ($explode[0] == 'Producers') {
                                $details[$matches[1]]['producers'] = trim($explode[1]);
                            }
                            if ($explode[0] == 'Licensors') {
                                $details[$matches[1]]['licensors'] = trim($explode[1]);
                            }
                            if ($explode[0] == 'Studios') {
                                $details[$matches[1]]['studios'] = trim($explode[1]);
                            }
                            if ($explode[0] == 'Score') {
                                $details[$matches[1]]['score'] = trim($explode[1]);
                            }
                            if ($explode[0] == 'Genres' || $explode[0] == 'Genre') {
                                $genres = preg_replace('/\b(\w+?)(?=\1)\1\b/i', '$1', trim($explode[1]));
                                $genres = preg_replace('/\b([A-Za-z-]+)\1\b/i', '$1', trim($genres));
                                $details[$matches[1]]['genres'] = $genres;
                            }
                        }
                        return $details;
                    }
                    return [];
                });
                $mergedArray = [];
                foreach (array_filter($filter) as $subArray) {
                    foreach ($subArray as $key => $values) {
                        if (!isset($mergedArray[$key])) {
                            $mergedArray[$key] = [];
                        }
                        $mergedArray[$key] = array_merge($mergedArray[$key], $values);
                    }
                }
                $this->info('| update data');
                $mergedArray[$model->mal_id]['cover'] = $images[0][0][0];
                Anime::where('mal_id', $model->mal_id)->update($mergedArray[$model->mal_id]);
            } catch (ClientExceptionInterface|RedirectionExceptionInterface|ServerExceptionInterface|TransportExceptionInterface $e) {
                dump($e->getMessage());
            }
            $x++;
            if ($x >= $count) {
                $this->info('| End');
                break;
            }
            $this->info('| sleep 3s');
            sleep(3);
        }

    }
}

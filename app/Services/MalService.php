<?php

namespace App\Services;

use App\Models\EntertainmentAnime;
use App\Models\EntertainmentEpisode;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class MalService
{
    /**
     * @throws TransportExceptionInterface
     */
    public function syncOne(EntertainmentAnime $anime): void
    {
        $url = $anime->url;
        $client = HttpClient::create();
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
            $mergedArray[$anime->mal_id]['cover'] = $images[0][0][0];
            EntertainmentAnime::where('mal_id', $anime->mal_id)->update($mergedArray[$anime->mal_id]);
        } catch (ClientExceptionInterface|RedirectionExceptionInterface|ServerExceptionInterface|TransportExceptionInterface $e) {
            dump($e->getMessage());
        }
    }

    /**
     * @throws TransportExceptionInterface
     */
    public function syncEpisodes(EntertainmentAnime $anime): void
    {
        $url = $anime->url;
        $client = HttpClient::create();
        $response = $client->request('GET', $url . '/episode');
        try {
            $crawler = new Crawler($response->getContent());
            $filters = $crawler->filter('tr.episode-list-data')->each(function (Crawler $node, $i) use ($url) {
                $titleOne = $node->filter('td.episode-title.fs12 > a')->each(function (Crawler $title, $i) use ($url) {
                    return preg_replace('/[^\p{L}\p{N},\/ ]/u', ' ', $title->text());
                });
                $titleTwo = $node->filter('td.episode-title.fs12 > span.di-ib')->each(function (Crawler $title, $i) use ($url) {
                    return preg_replace('/[^\p{L}\p{N},\/ ]/u', ' ', $title->text());
                });
                $episodeAired = $node->filter('td.episode-aired.nowrap')->each(function (Crawler $episodeAired, $i) use ($url) {
                    return preg_replace('/[^\p{L}\p{N},\/ ]/u', ' ', $episodeAired->text());
                });
                return [
                    'name' => $titleOne[0],
                    'title' => $titleTwo[0],
                    'aired' => $episodeAired[0],
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
            });
            foreach ($filters as $filter) {
                EntertainmentEpisode::updateOrInsert(['anime_id' => $anime->id, 'name' => $filter['name']], $filter);
            }
        } catch (ClientExceptionInterface|RedirectionExceptionInterface|ServerExceptionInterface|TransportExceptionInterface $e) {
            dump($e->getMessage());
        }
    }
}

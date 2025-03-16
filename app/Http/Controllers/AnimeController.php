<?php

namespace App\Http\Controllers;

use App\Models\EntertainmentAnime;
use App\Models\EntertainmentEpisode;
use App\Models\EntertainmentEpisodeDownload;
use App\Services\MalService;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    public function __construct(private readonly MalService $malservice)
    {

    }

    public function index(Request $request)
    {
        $animes = EntertainmentAnime::when($request->has('search'), function ($q) {
            $q->where('title', 'like', '%' . request('search') . '%');
        })->paginate();
        $total = EntertainmentAnime::count();
        return view('anime.index', compact('animes', 'total'));
    }

    public function show($id)
    {
        $anime = EntertainmentAnime::findOrFail($id);
        return view('anime.show', compact('anime'));
    }

    public function characters($id)
    {
        $anime = EntertainmentAnime::findOrFail($id);
        return view('anime.characters', compact('anime'));
    }

    public function episodes($id)
    {
        $anime = EntertainmentAnime::orderBy('id', 'ASC')->findOrFail($id);
        $episodes = EntertainmentEpisode::where('anime_id', $id)->get();
        return view('anime.episodes', compact('anime', 'episodes'));
    }

    public function pictures($id)
    {
        $anime = EntertainmentAnime::findOrFail($id);
        return view('anime.pictures', compact('anime'));
    }

    public function sync($id)
    {
        $anime = EntertainmentAnime::findOrFail($id);
        $this->malservice->syncOne($anime);
        return redirect()->back();
    }

    public function syncEpisodes($id)
    {
        $anime = EntertainmentAnime::findOrFail($id);
        $this->malservice->syncEpisodes($anime);
        return redirect()->back();
    }

    public function episodeShow($id, $episode_id)
    {
        $anime = EntertainmentAnime::findOrFail($id);
        $episode = EntertainmentEpisode::findOrFail($episode_id);
        $links = EntertainmentEpisodeDownload::where('episode_id', $episode->id)->get();
        $link = EntertainmentEpisodeDownload::where('episode_id', $episode->id)->first();
        $nextEpisode = EntertainmentEpisode::where('id', '>', $episode->id)->orderBy('id', 'asc')->where('anime_id', $id)->first();
        $previusEpisode = EntertainmentEpisode::where('id', '<', $episode->id)->orderBy('id', 'desc')->where('anime_id', $id)->first();
        return view('anime.episode_show', compact('anime', 'episode', 'links', 'link', 'nextEpisode', 'previusEpisode'));
    }

    public function episodeDetails($id, $episode_id, $link_id)
    {
        $anime = EntertainmentAnime::findOrFail($id);
        $episode = EntertainmentEpisode::findOrFail($episode_id);
        $links = EntertainmentEpisodeDownload::where('episode_id', $episode->id)->get();
        $link = EntertainmentEpisodeDownload::findOrFail($link_id);
        $nextEpisode = EntertainmentEpisode::where('id', '>', $episode->id)->orderBy('id', 'asc')->where('anime_id', $id)->first();
        $previusEpisode = EntertainmentEpisode::where('id', '<', $episode->id)->orderBy('id', 'desc')->where('anime_id', $id)->first();
        return view('anime.episode_show', compact('anime', 'episode', 'links', 'link', 'nextEpisode', 'previusEpisode'));
    }

    public function createEpisodeLink($id, $episode_id)
    {
        $anime = EntertainmentAnime::findOrFail($id);
        $episode = EntertainmentEpisode::findOrFail($episode_id);
        return view('anime.episode_link', compact('anime', 'episode'));
    }

    public function storeEpisodeLink($id, $episode_id, Request $request)
    {
        $link = new EntertainmentEpisodeDownload;
        $link->episode_id = $episode_id;
        $link->embed = $request->embed;
        $link->link = $request->link;
        $link->save();
        return redirect()->route('animes.episodes.show.link', ['id' => $id, 'link_id' => $link->id, 'episode_id' => $episode_id]);
    }
}

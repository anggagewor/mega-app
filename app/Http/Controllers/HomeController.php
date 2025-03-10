<?php

namespace App\Http\Controllers;

use App\Models\Dota2Config;
use App\Models\Dota2Player;
use App\Models\EntertainmentAnime;
use App\Models\LaptopModel;

class HomeController extends Controller
{
    public function index()
    {
        $totalLaptops = LaptopModel::count();
        $totalAnime = EntertainmentAnime::count();
        $dota2widget = Dota2Config::where('key','player_widget')->first()->value;
        $dota2player = Dota2Player::whereAccountId($dota2widget)->first();
        return view('home', compact('totalLaptops', 'totalAnime', 'dota2player'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\EntertainmentAnime;
use App\Models\LaptopModel;

class HomeController extends Controller
{
    public function index()
    {
        $totalLaptops = LaptopModel::count();
        $totalAnime = EntertainmentAnime::count();
        return view('home', compact('totalLaptops', 'totalAnime'));
    }
}

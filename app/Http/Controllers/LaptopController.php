<?php

namespace App\Http\Controllers;

use App\Models\LaptopModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class LaptopController extends Controller
{
    public function index(Request $request)
    {
        $laptops = LaptopModel::when($request->has('search'), function ($q) {
            $q->where('model', 'like', '%' . request('search') . '%');
        })->orderBy('id', 'desc')->paginate(20);
        return view('laptop.index', compact('laptops'));
    }

    public function fetch(Request $request)
    {
        Artisan::call('app:laptop-media-scrap', ['--urls' => $request->get('search')]);
        return redirect()->route('laptops.index');
    }

    public function show($id)
    {
        $laptop = LaptopModel::findOrFail($id);
        return view('laptop.show', compact('laptop'));
    }
}

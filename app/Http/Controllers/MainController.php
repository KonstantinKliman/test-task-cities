<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $cities = City::query()->paginate(15);
        $currentCity = session('city', null);
        return view('index', compact('cities', 'currentCity'));
    }

    public function about()
    {
        $currentCity = session('city', null);
        return view('about', compact('currentCity'));
    }

    public function news()
    {
        $currentCity = session('city', null);
        return view('news', compact('currentCity'));
    }
}

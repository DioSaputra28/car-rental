<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Galery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredCars = Car::where('is_featured', true)->get();

        $galleries = Galery::limit(8)->get();

        return view('web.pages.home', [
            "featured_cars" => $featuredCars,
            "galleries" => $galleries,
        ]);
    }
}

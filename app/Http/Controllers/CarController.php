<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::latest()->get();

        return view('web.pages.cars.index', compact('cars'));
    }

    public function show($slug)
    {
        $car = Car::where('slug', $slug)->with('images')->firstOrFail();

        return view('web.pages.cars.single', compact('car'));
    }
}

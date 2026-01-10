<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $query = Car::query();

        // Handle search
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where('name', 'like', '%' . $searchTerm . '%');
        }

        $cars = $query->latest()->get();
        $searchTerm = $request->search;

        return view('web.pages.cars.index', compact('cars', 'searchTerm'));
    }

    public function show($slug)
    {
        $car = Car::where('slug', $slug)->with('images')->firstOrFail();

        return view('web.pages.cars.single', compact('car'));
    }
}

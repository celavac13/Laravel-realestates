<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Realestate;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(Request $request)
    {
        $realestates = Realestate::where('city_id', $request->city)->get();
        $cities = City::get();
        $totalInCity = fn ($id) => Realestate::where('city_id', $id)->count();

        return view('realestates.index', [
            'realestates' => $realestates,
            'cities' => $cities,
            'totalInCity' => $totalInCity
        ]);
    }
}

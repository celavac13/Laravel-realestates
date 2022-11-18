<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Realestate;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $realestates = Realestate::get();
        $cities = City::get();
        $totalInCity = fn ($id) => Realestate::where('city_id', $id)->count();

        return view('realestates.index', [
            'realestates' => $realestates,
            'cities' => $cities,
            'totalInCity' => $totalInCity
        ]);
    }
}

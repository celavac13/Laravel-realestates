<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Realestate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    public function index(City $city)
    {
        $realestates = $city->realestates;
        $cities = DB::table('realestates')->selectRaw('city_id as id, count(*) as total, cities.name')->join('cities', 'cities.id', '=', 'realestates.city_id')->groupBy('city_id')->get();

        return view('realestates.index', [
            'realestates' => $realestates,
            'cities' => $cities,
        ]);
    }
}

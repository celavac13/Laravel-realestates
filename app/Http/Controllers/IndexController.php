<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Realestate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        $realestates = Realestate::get();
        $cities = DB::table('realestates')->selectRaw('city_id as id, count(*) as total, cities.name')->join('cities', 'cities.id', '=', 'realestates.city_id')->groupBy('city_id')->get();

        return view('realestates.index', [
            'realestates' => $realestates,
            'cities' => $cities
        ]);
    }
}

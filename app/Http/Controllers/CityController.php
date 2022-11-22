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

        return view('realestates.index', [
            'realestates' => $realestates,
        ]);
    }
}

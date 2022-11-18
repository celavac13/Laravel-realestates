<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Realestate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RealestateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cities = City::get();
        return view('realestates.addRealestate', [
            'cities' => $cities
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'city' => 'required|max:255',
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'image' => 'required|image'
        ]);

        $request->user()->realestates()->create([
            'city_id' => $request->city,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->file('image')->store('images', 'public')
        ]);

        return redirect()->route('home');
    }

    public function show(Realestate $realestate)
    {

        $cities = DB::table('realestates')->selectRaw('city_id as id, count(*) as total, cities.name')->join('cities', 'cities.id', '=', 'realestates.city_id')->groupBy('city_id')->get();

        return view('realestates.single', [
            'realestate' => $realestate,
            'cities' => $cities,
            'isFavourite' => true
        ]);
    }
}

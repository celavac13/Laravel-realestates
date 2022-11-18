<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Realestate;
use Illuminate\Http\Request;

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
            'image' => $request->file('image')->store('images')
        ]);

        return redirect()->route('home');
    }
}

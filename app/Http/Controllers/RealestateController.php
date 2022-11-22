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
        $this->middleware('auth')->only('store');
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
        $isFavourite = !$realestate->favouritedBy->isEmpty();

        return view('realestates.single', [
            'realestate' => $realestate,
            'isFavourite' => $isFavourite
        ]);
    }

    public function update(Realestate $realestate)
    {
        if (auth()->user()->id !== $realestate->user_id) {
            return redirect()->route('home');
        } else {
            $cities = City::get();
            return view('realestates.edit', [
                'realestate' => $realestate,
                'cities' => $cities
            ]);
        }
    }

    public function edit(Realestate $realestate, Request $request)
    {
        $this->validate($request, [
            'city' => 'required',
            'title' => 'required',
            'description' => 'required'
        ]);

        $realestate->update([
            'city_id' => $request->city,
            'title' => $request->title,
            'description' => $request->description

        ]);

        return redirect()->route('home');
    }
}

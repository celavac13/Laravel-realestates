<?php

namespace App\Http\Controllers;

use App\Models\Realestate;
use Illuminate\Http\Request;

class FavouritesController extends Controller
{
    public function index()
    {
        return view('realestates.index');
    }

    public function addToFavourites(Realestate $realestate, Request $request)
    {
        dd($realestate);
    }

    public function removeFromFavourites(Realestate $realestate, Request $request)
    {
        dd($request);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Realestate;
use App\Models\User;
use Illuminate\Http\Request;

class FavouritesController extends Controller
{
    public function index()
    {
        return view('realestates.index');
    }


    public function store(Realestate $realestate)
    {
        /** @var User $user */
        $user = auth()->user();
        $user->favouritesRealestate()->attach($realestate);
        return response()->json([
            'status' => 'success',
            'msg' => 'Added to favourites',
        ]);
    }

    public function destroy(Realestate $realestate)
    {
        /** @var User $user */
        $user = auth()->user();
        $user->favouritesRealestate()->detach($realestate);
        return response()->json([
            'status' => 'success',
            'msg' => 'Removed from favourites',
        ]);
    }
}

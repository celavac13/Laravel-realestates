<?php

namespace App\Http\Controllers;

use App\Models\Realestate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FavouritesController extends Controller
{
    public function __contstruct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        /** @var User $user */
        $user = auth()->user();
        $realestates = $user->favouritesRealestate()->get();
        $cities = DB::table('realestates')->selectRaw('city_id as id, count(*) as total, cities.name')->join('cities', 'cities.id', '=', 'realestates.city_id')->groupBy('city_id')->get();
        return view('realestates.index', [
            'realestates' => $realestates,
            'cities' => $cities
        ]);
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

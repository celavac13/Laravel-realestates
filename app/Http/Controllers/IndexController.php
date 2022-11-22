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

        return view('realestates.index', [
            'realestates' => $realestates,
        ]);
    }
}

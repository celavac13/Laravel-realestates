<?php

namespace App\View\Components;

use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class Dropdown extends Component
{

    public $cities;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->cities = DB::table('realestates')->selectRaw('city_id as id, count(*) as total, cities.name')->join('cities', 'cities.id', '=', 'realestates.city_id')->groupBy('city_id')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dropdown');
    }
}

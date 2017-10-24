<?php

namespace App\Http\Controllers;


use Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Tickets;
use App\Models\City;
use App\Models\Bus;

class indexController extends Controller
{

    public function search(){
        // Sets the parameters from the get request to the variables.
        $fromCityName = Request::get('from');
        $toCityName   = Request::get('to');
        $date         = Request::get('date');
        
        $from_id   = City::where('name', $fromCityName)->pluck('id');
        $to_id     = City::where('name', $toCityName)->pluck('id');
        
        $result = Tickets::leftJoin('city as city_from', 'city_from.id', '=', 'tickets.from_city_id')
                         ->leftJoin('city as city_to',   'city_to.id',   '=', 'tickets.to_city_id')
                         ->leftJoin('bus',   'bus.id',   '=', 'tickets.bus_id')
                         ->where(['from_city_id' => $from_id, 'to_city_id' => $to_id, 'date' => $date])
        ->paginate(10,['tickets.*', 'city_from.name as city_from_name', 
                            'bus.cerrier as bus_cerrier',  
                            'bus.cerrier as bus_cerrier',  
        'city_to.name as city_to_name']);

        return view('index.search', ['tickets' => $result]);
    }
}
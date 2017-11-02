<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;    
use Illuminate\Http\Request;
use App\Models\Tickets;
use App\Models\City;
use App\Models\Bus;


class TicketController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets  =  Tickets::leftJoin('city as city_from', 'city_from.id', '=', 'tickets.from_city_id')
                            ->leftJoin('city as city_to',   'city_to.id',   '=', 'tickets.to_city_id')
                            ->leftJoin('bus',   'bus.id',   '=', 'tickets.bus_id')
                    ->paginate(3,['tickets.*',  'city_from.name  as city_from_name', 
                                                    'bus.cerrier  as bus_cerrier',  
                                                    'city_to.name as city_to_name']);
        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city_names = City::all();
        $bus_list   = Bus::all();
        

        return view('tickets.create',['city_names' => $city_names,'bus_list' => $bus_list]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Tickets::create($request->all());
        return redirect()->route('tickets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

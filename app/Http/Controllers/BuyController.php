<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Models\UsersBuy;
use App\Models\Tickets;
use App\Http\Requests\ValidatePayTicket;
use Illuminate\Support\Collection;

class BuyController extends Controller
{
    public function buyTicket(int $id)
    {
                
        $result = Tickets::leftJoin('city as city_from', 'city_from.id', '=', 'tickets.from_city_id')
        ->leftJoin('city as city_to',   'city_to.id',   '=', 'tickets.to_city_id')
        ->leftJoin('bus',   'bus.id',   '=', 'tickets.bus_id')
        ->where(['tickets.id' => $id,])
        ->get(['tickets.*', 'city_from.name as city_from_name', 
                'bus.cerrier as bus_cerrier',  
                'bus.mark as bus_mark',  
          'bus.bus_number as bus_number',  
          
            'city_to.name as city_to_name']);

        return view('index.buy',['result' => $result]);
    }

    public function payTicket(ValidatePayTicket $request)
    {
        $id = $request->ticket_id;
        $ticket = Tickets::select('number_passenger', 'limit_passenger')->where(['id' => $id])->first();

        if($ticket->number_passenger < $ticket->limit_passenger){

            $UsersBuy = new UsersBuy;
            $UsersBuy->first_name   = $request->first_name;
            $UsersBuy->last_name    = $request->last_name;         
            $UsersBuy->phone_number = $request->phone_number;
            $UsersBuy->email        = $request->email;
            $UsersBuy->ticket_id    = $request->ticket_id;
            $UsersBuy->status       = false;
            $UsersBuy->save();
            
            
            $id = $UsersBuy->ticket_id;
            $ticket = Tickets::find($id);            
            $ticket->number_passenger += 1;

            $ticket->save();  

            echo("Вас додано до списку пасажирів...");
        }else{
            echo 'Вільних місць не залишилось... ';
        }

    }
}

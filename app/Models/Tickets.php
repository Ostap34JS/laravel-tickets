<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    protected $table = 'tickets';
    
/*    public function bus() {
        return $this->hasManyThrough(
            'App\Models\Tickets',
            'App\Models\Bus',
            'bus_id', // Foreign key on users table...
            'id' // Foreign key on posts table...
        );   
    }*/ 

}

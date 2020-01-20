<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public function ticket_status()
    {
        return $this->belongsTo('App\TicketStatus');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function assets()
    {
    	return $this->belongsToMany('App\Title','asset_ticket')
    		->withPivot('asset_code');
    }
}

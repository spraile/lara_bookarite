<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    public function title()
    {
        return $this->belongsTo('App\Title');
    }
    public function asset_status()
    {
        return $this->belongsTo('App\AssetStatus');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tickets()
    {
    	return $this->belongsToMany('App\Ticket','asset_ticket')
    		->withPivot('asset_code');
    }
}

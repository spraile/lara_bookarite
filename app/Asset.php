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
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    
    public function author()
    {
        return $this->belongsTo('App\Author');
    }
    
    public function title_status()
    {
        return $this->belongsTo('App\TitleStatus');
    }

    public function assets()
    {
        return $this->hasMany('App\Asset');
    }
}

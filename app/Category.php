<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function titles()
    {
        return $this->hasMany('App\Title');
    }
}

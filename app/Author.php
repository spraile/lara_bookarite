<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function titles()
    {
        return $this->hasMany('App\Title');
    }
}

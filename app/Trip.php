<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    //
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
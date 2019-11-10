<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    //
    protected $fillable = [
        'name',
        'lon',
        'lat',
        'date',
        'path',
        'text_fr',
        'text_en'
    ];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}

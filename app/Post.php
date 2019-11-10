<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'name',
        'lon',
        'lat',
        'trip_id',
        'path',
        'image',
        'photographer',
        'rating',
        'date',
        'type',
        'text_fr',
        'text_en'
    ];

    protected $hidden = ['id','created_at','updated_at','trip_id'];
}

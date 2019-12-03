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
        'url',
        'file_type',
        'image',
        'photographer',
        'rating',
        'date',
        'type',
        'text_fr',
        'text_en'
    ];

    protected $hidden = ['created_at','updated_at','trip_id'];
}

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
        'path',
        'image',
        'photographer',
        'rating',
        'date',
        'type',
        'text',
    ];
}

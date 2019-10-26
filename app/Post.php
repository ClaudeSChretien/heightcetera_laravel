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
        'photographer',
        'rating',
        'date',
        'type',
        'text',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'name',
        'description',
        'duration',
        'release_date',
        'rating',
        'genre_id',
        'language',
        'cast'
    ];
}

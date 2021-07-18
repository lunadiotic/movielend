<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{

    /**
     * List of Movie fields
     *
     * @var array
     */
    protected $fillable = [
        'title', 'genre', 'released'
    ];

    /**
     * Get all of the lendings for the Movie
     */
    public function lendings()
    {
        return $this->hasMany(Lending::class);
    }
}

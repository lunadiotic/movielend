<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lending extends Model
{
    /**
     * List of Lending fields
     *
     * @var array
     */
    protected $fillable = [
        'movie_id', 'member_id',
        'lending', 'returned', 'lateness_charge'
    ];

    /**
     * Get the member that owns the Lending
     *
     */
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    /**
     * Get the member that owns the Lending
     *
     */
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}

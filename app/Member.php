<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /**
     * List of Member fields
     *
     * @var array
     */
    protected $fillable = [
        'name', 'age', 'address',
        'telephone', 'identity_number',
        'joined', 'is_active'
    ];

    /**
     * Get all of the lendings for the Member
     */
    public function lendings()
    {
        return $this->hasMany(Lending::class);
    }
}

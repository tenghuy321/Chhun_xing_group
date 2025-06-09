<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OurPeople extends Model
{
    protected $table = 'our_peoples';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'position',
        'order',
        'image'
    ];

    protected $casts = [
        'name' => 'array',
        'position' => 'array'
    ];
}

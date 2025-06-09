<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OurTeam extends Model
{
    protected $table = 'our_teams';
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

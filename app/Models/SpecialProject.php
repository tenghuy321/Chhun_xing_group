<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpecialProject extends Model
{
    protected $table = 'special_projects';
    protected $primaryKey = 'id';

    protected $fillable = [
        'icon',
        'title'
    ];

    protected $casts = [
        'title' => 'array',
    ];
}

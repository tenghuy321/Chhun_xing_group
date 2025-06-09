<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'content',
        'order',
        'image'
    ];

    protected $casts = [
        'name' => 'array',
        'content' => 'array',
        'image' => 'array'
    ];
}

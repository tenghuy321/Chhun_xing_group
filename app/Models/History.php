<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'histories';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'content',
        'image'
    ];

    protected $casts = [
        'title' => 'array',
        'content' => 'array',
        'image' => 'array'
    ];
}

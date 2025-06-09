<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoreValue extends Model
{
    protected $table = 'core_values';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'order',
        'content',
    ];

    protected $casts = [
        'title' => 'array',
        'content' => 'array'
    ];
}

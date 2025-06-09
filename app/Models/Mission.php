<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    protected $table = 'missions';
    protected $primaryKey = 'id';

    protected $fillable = [
        'content',
    ];

    protected $casts = [
        'content' => 'array'
    ];
}

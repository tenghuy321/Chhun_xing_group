<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vision extends Model
{
    protected $table = 'visions';
    protected $primaryKey = 'id';

    protected $fillable = [
        'content',
    ];

    protected $casts = [
        'content' => 'array'
    ];
}

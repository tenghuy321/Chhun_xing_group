<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResidencePage extends Model
{
    protected $table = 'residencepages';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'image'
    ];

    protected $casts = [
        'title' => 'array',
    ];
}

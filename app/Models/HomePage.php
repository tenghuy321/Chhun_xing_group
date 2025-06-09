<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    protected $table = 'homepages';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'sub_title',
        'sub_title1',
        'content',
        'image'
    ];

    protected $casts = [
        'title' => 'array',
        'sub_title' => 'array',
        'sub_title1' => 'array',
        'content' => 'array'
    ];
}

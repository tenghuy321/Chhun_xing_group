<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutList extends Model
{
    protected $table = 'aboutlists';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'icon',
    ];

    protected $casts = [
        'title' => 'array',
    ];
}

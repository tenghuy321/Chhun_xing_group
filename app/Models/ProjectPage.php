<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectPage extends Model
{
    protected $table = 'projectpages';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'content',
        'image'
    ];

    protected $casts = [
        'title' => 'array',
        'content' => 'array',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectExperince extends Model
{
    protected $table = 'project_experinces';

    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'content',
        'image',
        'order'
    ];

    protected $casts = [
        'title' => 'array',
        'content' => 'array',
        'image' => 'array'
    ];
}

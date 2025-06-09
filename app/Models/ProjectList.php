<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectList extends Model
{
    protected $table = 'projectlists';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
    ];

    protected $casts = [
        'title' => 'array',
    ];
}

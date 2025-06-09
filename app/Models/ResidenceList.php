<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResidenceList extends Model
{
    protected $table = 'residencelists';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'icon',
    ];

    protected $casts = [
        'title' => 'array',
    ];
}

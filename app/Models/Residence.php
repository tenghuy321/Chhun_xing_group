<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Residence extends Model
{
    protected $table = 'residences';

    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'content',
        'image',
        'order'
    ];
    protected $casts = [
        'name' => 'array',
        'content' => 'array',
        'image' => 'array'
    ];
}

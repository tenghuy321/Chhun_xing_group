<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyUs extends Model
{
    protected $table = 'why_us';

    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'content',
        'image',
    ];
    protected $casts = [
        'title' => 'array',
        'content' => 'array',
    ];
}

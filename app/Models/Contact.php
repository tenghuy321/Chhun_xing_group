<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';

    protected $primaryKey = 'id';

    protected $fillable = [
        'phone_number1',
        'phone_number2',
        'email',
        'location',
        'facebook',
        'telegram',
        'image'
    ];

    protected $casts = [
        'location' => 'array',
    ];
}

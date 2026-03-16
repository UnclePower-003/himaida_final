<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Distributorship extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'points',
        'contacts',
    ];

    protected $casts = [
        'points' => 'array',
        'contacts' => 'array',
    ];
}
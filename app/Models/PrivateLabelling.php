<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrivateLabelling extends Model
{
    protected $fillable = [
        'title',
        'description',
        'points',
        'image',
    ];

    protected $casts = [
        'points' => 'array',
    ];
}

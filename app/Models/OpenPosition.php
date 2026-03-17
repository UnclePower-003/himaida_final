<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpenPosition extends Model
{
    protected $fillable = ['title', 'description', 'meta', 'apply_link'];

    protected $casts = [
        'meta' => 'array', // JSON automatically converted to array
    ];
}

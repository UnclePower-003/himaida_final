<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'image',
        'is_featured',
    ];
}
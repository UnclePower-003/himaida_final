<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manufacturing extends Model
{
    protected $fillable = [
        'title',
        'top_text',
        'bottom_text',
        'description_one',
        'description_two',
        'image',
    ];
}

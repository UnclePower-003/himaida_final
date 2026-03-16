<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrivateLabelHero extends Model
{
    protected $fillable = [
        'title',
        'highlight_text',
        'subtitle',
        'image'
    ];
}
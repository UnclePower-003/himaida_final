<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OurBrandHeroSection extends Model
{
    protected $table = 'ourbrandherosections';
    protected $fillable = [
        'title_line_1',
        'highlight_1',
        'title_line_2',
        'highlight_2',
        'background_image',
        'is_active'
    ];
}
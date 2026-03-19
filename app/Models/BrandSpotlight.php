<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrandSpotlight extends Model
{
    protected $fillable = [
        'title',
        'title_color',
        'description',
        'brand_image',
        'circle_image',
        'tags',
        'active',
    ];

    protected $casts = [
        'tags'   => 'array',   // ← critical: stores/retrieves as JSON array
        'active' => 'boolean',
    ];
}
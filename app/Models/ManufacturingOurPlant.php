<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManufacturingOurPlant extends Model
{
    protected $fillable = [
        'title',
        'descriptions',
        'image'
    ];

    protected $casts = [
        'descriptions' => 'array'
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManufacturingHighlight extends Model
{
    protected $fillable = [
        'title',
        'description',
        'column',
        'order'
    ];
}

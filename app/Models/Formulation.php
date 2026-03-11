<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formulation extends Model
{
    protected $fillable = [
        'title',
        'description',
        'icon',
        'position',
        'status',
    ];
}

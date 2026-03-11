<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Corevalue extends Model
{
    protected $table = 'corevalues';

    protected $fillable = [
        'icon',
        'title'
    ];
}
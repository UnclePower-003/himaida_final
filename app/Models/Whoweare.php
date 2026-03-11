<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Whoweare extends Model
{
    protected $fillable = [
        'title',
        'year_number',
        'year_text',
        'description1',
        'description2',
        'image1',
        'image2'
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisionMission extends Model
{
    protected $fillable = [
        'vision_icon',
        'vision_title',
        'vision_description',
        'mission_icon',
        'mission_title',
        'mission_description',
    ];
}

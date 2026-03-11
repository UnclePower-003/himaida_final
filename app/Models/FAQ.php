<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    protected $table = 'faqs'; // 👈 FORCE correct table

    protected $fillable = [
        'question',
        'answer',
        'is_active',
    ];
}

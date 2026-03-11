<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FAQBanner extends Model
{
     protected $table = 'faq_banners';
    protected $fillable = [
        'title',
        'image'
    ];
}
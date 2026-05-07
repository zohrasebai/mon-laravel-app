<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    // أضف subtitle_fr وبقية الحقول هنا
    protected $fillable = [
        'subtitle_fr', 
        'title_fr', 
        'desc_fr'
    ];
}
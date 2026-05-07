<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestimonialItem extends Model
{
    // أضف الحقول الحقيقية فقط، ولا تضف _token هنا
    protected $fillable = ['name', 'text_fr', 'img'];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
   protected $fillable = ['image', 'title_fr', 'subtitle_fr', 'description_fr', 'btn_text_fr', 'btn_link', 'order'];
}

<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class OfferSection extends Model {
    protected $fillable = ['id', 'title_fr', 'text_fr', 'bg_image', 'btn_text_fr', 'btn_url'];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoreValue extends Model {
    protected $fillable = ['id', 'subtitle_fr', 'title_fr', 'desc_fr', 'image'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NavLink extends Model
{
    protected $fillable = [
        'title',
        'url',
        'position',
        'is_active',
    ];
}

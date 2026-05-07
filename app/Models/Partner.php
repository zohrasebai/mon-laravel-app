<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    // Les champs autorisés (identiques à la migration)
    protected $fillable = [
        'name',
        'image',
        'order',
    ];
}
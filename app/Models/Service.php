<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Service extends Model {
    protected $fillable = ['title_fr', 'desc_fr', 'icon', 'order'];
}
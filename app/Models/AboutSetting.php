<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSetting extends Model
{
    use HasFactory;

    // تحديد المجلد في قاعدة البيانات (اختياري إذا كان الجمع صحيحاً)
    protected $table = 'about_settings';

    // الحقول المسموح بتعديلها
    protected $fillable = [
        'image', 
        'title_fr', 
        'text_1_fr', 
        'text_2_fr', 
        'button_text_fr', 
        'button_url'
    ];
}
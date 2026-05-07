<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoSection extends Model // تأكد أن الاسم VideoSection وليس شيئاً آخر
{
    protected $fillable = ['id', 'video_url', 'video_bg', 'video_img', 'title_fr', 'text_fr'];
}
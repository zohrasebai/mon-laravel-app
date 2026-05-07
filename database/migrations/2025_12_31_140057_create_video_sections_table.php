<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('video_sections', function (Blueprint $table) {
        $table->id();
        $table->string('video_url')->nullable();      // رابط اليوتيوب
        $table->string('video_bg')->nullable();       // صورة الخلفية للقسم
        $table->string('video_img')->nullable();      // الصورة التي تظهر فوق الفيديو
        $table->string('title_fr')->nullable();       // العنوان
        $table->text('text_fr')->nullable();          // الوصف
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video_sections');
    }
};

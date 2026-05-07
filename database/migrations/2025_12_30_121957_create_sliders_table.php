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
    Schema::create('sliders', function (Blueprint $table) {
        $table->id();
        $table->string('image'); // مسار الصورة
        $table->string('title_fr')->nullable(); // العنوان الرئيسي بالفرنسية
        $table->string('subtitle_fr')->nullable(); // نص إضافي
        $table->text('description_fr')->nullable(); // الوصف أو قائمة التخصصات
        $table->string('btn_text_fr')->nullable(); // نص الزر
        $table->string('btn_link')->nullable(); // رابط الزر
        $table->integer('order')->default(0); // ترتيب الظهور
        $table->timestamps();
    });
}                                                                                                       

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};

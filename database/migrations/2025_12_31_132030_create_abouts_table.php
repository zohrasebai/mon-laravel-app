<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_abouts_table.php
        public function up()
        {
            Schema::create('abouts', function (Blueprint $table) {
                $table->id();
                $table->string('title_fr')->nullable();
                $table->text('text_1_fr')->nullable(); // المقدمة
                $table->text('text_2_fr')->nullable(); // المهمة أو النص الثاني
                $table->string('image')->nullable();    // مسار الصورة التوضيحية
                $table->timestamps();
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
    Schema::create('about_settings', function (Blueprint $table) {
        $table->id();
        $table->string('image')->nullable();
        $table->string('title_fr');
        $table->text('text_1_fr');
        $table->text('text_2_fr');
        $table->string('button_text_fr')->default('Découvrir Plus');
        $table->string('button_url')->default('#about');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_settings');
    }
};

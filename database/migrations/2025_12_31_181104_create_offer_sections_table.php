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
        Schema::create('offer_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title_fr')->nullable();
            $table->text('text_fr')->nullable();
            $table->string('bg_image')->nullable();
            $table->string('btn_text_fr')->nullable();
            $table->string('btn_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offer_sections');
    }
};

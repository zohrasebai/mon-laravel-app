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
    Schema::create('section_settings', function (Blueprint $table) {
        $table->id();
        $table->string('section_name')->unique(); // هذا هو العمود الذي يبحث عنه الكود
        $table->string('subtitle_fr')->nullable();
        $table->string('title_fr')->nullable();
        $table->text('desc_fr')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section_settings');
    }
};

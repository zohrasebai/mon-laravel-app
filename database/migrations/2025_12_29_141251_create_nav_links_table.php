<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('nav_links', function (Blueprint $table) {
        $table->id();
        $table->string('title'); // Accueil, Qui sommes-nous...
        $table->string('url');   // #about, /contact...
        $table->integer('position')->default(0); // ترتيب الروابط
        $table->boolean('is_active')->default(true);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nav_links');
    }
};

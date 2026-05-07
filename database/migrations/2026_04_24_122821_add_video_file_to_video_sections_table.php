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
    Schema::table('video_sections', function (Blueprint $table) {
        $table->string('video_file')->nullable();
    });
}

public function down()
{
    Schema::table('video_sections', function (Blueprint $table) {
        $table->dropColumn('video_file');
    });
}
    /**
     * Reverse the migrations.
     */

};

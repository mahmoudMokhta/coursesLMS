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
        Schema::create('matrials', function (Blueprint $table) {
            $table->id();
            $table->text('matrialFile');


            $table->unsignedBigInteger('course_content_id');
            $table->foreign('course_content_id')->references('id')->on('course_contents');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matrials');
    }
};

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
        Schema::create('lessons', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('topic');
            $table->enum('type', ['DRIVER', 'TEORIC']);
            $table->unique('topic', 'type');
            $table->timestamps();
        });

        Schema::create('enrolment_lesson', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('lesson_id');
            $table->string('enrolment_id');
            $table->foreign('lesson_id')->references('id')->on('lessons');
            $table->foreign('enrolment_id')->references('id')->on('enrolments');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
        Schema::dropIfExists('enrolment_lesson');
    }
};

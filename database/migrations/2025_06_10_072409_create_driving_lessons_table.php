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
        Schema::create('driving_lessons', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('instructor_id');
            $table->string('student_id');
            $table->string('vehicle_id');
            $table->time('starter');
            $table->time('finished');
            $table->timestamps();
            $table->foreign('instructor_id')->references('id')->on('instructors');
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driving_lessons');
    }
};

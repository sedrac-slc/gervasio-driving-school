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
        Schema::create('exam_appointments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('student_id');
            $table->date('date_realisation');
            $table->time('hour_start');
            $table->timestamps();
            $table->foreign('student_id')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_appointments');
    }
};

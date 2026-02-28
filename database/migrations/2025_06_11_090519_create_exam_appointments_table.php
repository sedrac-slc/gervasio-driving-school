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
            $table->string('enrolment_id');
            $table->date('date');
            $table->time('hour');
            $table->boolean('completed')->default(false);
            $table->boolean('approved')->default(false);
            $table->timestamps();
            $table->foreign('enrolment_id')->references('id')->on('enrolments');
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

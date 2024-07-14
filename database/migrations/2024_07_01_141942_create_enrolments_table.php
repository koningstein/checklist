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
        Schema::create('enrolments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('restrict');
            $table->foreignId('crebo_id')->constrained('crebos')->onDelete('restrict');
            $table->foreignId('cohort_id')->constrained('cohorts')->onDelete('restrict');
            $table->date('date');
            $table->foreignId('enrolment_status_id')->constrained('enrolment_statuses')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrolments');
    }
};

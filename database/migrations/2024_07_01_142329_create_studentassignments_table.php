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
        Schema::create('student_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('enrolment_class_id')->constrained('enrolment_classes')->onDelete('restrict');
            $table->foreignId('class_assignment_id')->constrained('class_assignments')->onDelete('restrict');
            $table->dateTime('duedate')->nullable();
            $table->foreignId('assignment_status_id')->constrained('assignment_statuses')->onDelete('restrict');
            $table->foreignId('marked_by_id')->nullable()->constrained('users')->onDelete('restrict');
            $table->boolean('completed')->default(false);
            $table->dateTime('marked_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_assignments');
    }
};

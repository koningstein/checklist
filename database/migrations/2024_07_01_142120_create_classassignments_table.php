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
        Schema::create('class_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_year_id')->constrained('class_years')->onDelete('restrict');
            $table->foreignId('assignment_id')->constrained('assignments')->onDelete('restrict');
            $table->dateTime('duedate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_assignments');
    }
};

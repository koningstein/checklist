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
        Schema::create('learning_suboutcomes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('learning_outcome_id')->constrained()->onDelete('cascade');
            $table->string('number', 10); // Nieuwe kolom voor het nummer met een maximum van 10 tekens
            $table->string('name', 255);
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learning_suboutcomes');
    }
};

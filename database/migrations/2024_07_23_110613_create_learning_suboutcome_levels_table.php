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
        Schema::create('learning_suboutcome_levels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('learning_suboutcome_id')->constrained('learning_suboutcomes')->onDelete('cascade');
            $table->foreignId('learning_level_id')->constrained('learning_levels')->onDelete('cascade');
            $table->foreignId('period_id')->nullable()->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suboutcome_levels');
    }
};

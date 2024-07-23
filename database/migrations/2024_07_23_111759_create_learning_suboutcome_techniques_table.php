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
        Schema::create('learning_suboutcome_techniques', function (Blueprint $table) {
            $table->id();
            $table->foreignId('learning_suboutcome_id')->constrained()->onDelete('cascade');
            $table->foreignId('learning_related_technique_id')->constrained()->onDelete('cascade')
                ->name('learning_suboutcome_technique_fk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learning_suboutcome_techniques');
    }
};

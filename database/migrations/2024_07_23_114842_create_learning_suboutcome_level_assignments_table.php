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
        Schema::create('learning_suboutcome_level_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('learning_suboutcome_level_id')->constrained()->onDelete('cascade')->name('ls_level_id_fk');;
            $table->foreignId('assignment_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learning_suboutcome_level_assignments');
    }
};

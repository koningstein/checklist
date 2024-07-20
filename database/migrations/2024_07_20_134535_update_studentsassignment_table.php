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
        Schema::table('student_assignments', function (Blueprint $table) {
            //
            $table->foreignId('class_assignment_id')->nullable()->change();
            $table->foreignId('individual_assignment_id')->nullable()->constrained('assignments')->onDelete('restrict');        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_assignments', function (Blueprint $table) {
            // Zet class_assignment_id terug naar non-nullable
            $table->foreignId('class_assignment_id')->nullable(false)->change();

            // Verwijder individual_assignment_id kolom
            $table->dropForeign(['individual_assignment_id']);
            $table->dropColumn('individual_assignment_id');
        });
    }
};

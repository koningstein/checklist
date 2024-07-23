<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LearningSuboutcomeAssignment extends Model
{
    use HasFactory;
    protected $table = 'learning_suboutcome_assignments';

    protected $fillable = [
        'learning_suboutcome_id',
        'assignment_id',
    ];

    public function learningSuboutcome(): BelongsTo
    {
        return $this->belongsTo(LearningSuboutcome::class);
    }

    public function assignment(): BelongsTo
    {
        return $this->belongsTo(Assignment::class);
    }
}

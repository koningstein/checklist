<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LearningSuboutcomeLevelAssignment extends Model
{
    use HasFactory;
    protected $table = 'learning_suboutcome_level_assignments';

    protected $fillable = [
        'learning_suboutcome_level_id',
        'assignment_id',
    ];

    public function learningSuboutcomeLevel(): BelongsTo
    {
        return $this->belongsTo(LearningSuboutcomeLevel::class);
    }

    public function assignment(): BelongsTo
    {
        return $this->belongsTo(Assignment::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LearningSuboutcomeLevel extends Model
{
    use HasFactory;
    protected $table = 'learning_suboutcome_levels';

    protected $fillable = [
        'learning_suboutcome_id',
        'learning_level_id',
        'description',
    ];

    public function learningSuboutcome(): BelongsTo
    {
        return $this->belongsTo(LearningSuboutcome::class);
    }

    public function learningLevel(): BelongsTo
    {
        return $this->belongsTo(LearningLevel::class);
    }

    public function learningSuboutcomeLevelAssignments(): HasMany
    {
        return $this->HasMany(LearningSuboutcomeLevelAssignment::class);
    }
}

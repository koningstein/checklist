<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LearningSuboutcome extends Model
{
    use HasFactory;
    protected $table = 'learning_suboutcomes';

    protected $fillable = [
        'learning_outcome_id',
        'name',
        'description',
    ];

    public function learningOutcome(): BelongsTo
    {
        return $this->belongsTo(LearningOutcome::class);
    }

    public function learningSuboutcomeLevels(): HasMany
    {
        return $this->hasMany(LearningSuboutcomeLevel::class);
    }

    public function learningSuboutcomeTechniques(): HasMany
    {
        return $this->hasMany(LearningSuboutcomeTechnique::class);
    }
}

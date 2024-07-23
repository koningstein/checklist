<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LearningSuboutcomeTechnique extends Model
{
    use HasFactory;
    protected $table = 'learning_suboutcome_techniques';

    protected $fillable = [
        'learning_suboutcome_id',
        'learning_related_technique_id',
    ];

    public function learningSuboutcome(): BelongsTo
    {
        return $this->belongsTo(LearningSuboutcome::class);
    }

    public function learningRelatedTechnique(): BelongsTo
    {
        return $this->belongsTo(LearningRelatedTechnique::class);
    }
}

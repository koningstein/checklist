<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LearningOutcome extends Model
{
    use HasFactory;
    protected $table = 'learning_outcomes';

    protected $fillable = [
        'number',
        'name',
        'description',
    ];

    public function learningSuboutcomes(): HasMany
    {
        return $this->hasMany(LearningSuboutcome::class);
    }
}

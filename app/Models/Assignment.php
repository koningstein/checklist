<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Assignment extends Model
{
    use HasFactory;
    protected $table = 'assignments';
    protected $fillable = [
        'number',
        'name',
        'description',
        'duedate',
        'module_id',
    ];

    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }

    public function classAssignments(): HasMany
    {
        return $this->hasMany(ClassAssignment::class);
    }

    public function studentAssignments(): HasMany
    {
        return $this->hasMany(StudentAssignment::class);
    }

    public function learningSuboutcomesAssignments(): HasMany
    {
        return $this->hasMany(LearningSuboutcomeAssignment::class);
    }
}

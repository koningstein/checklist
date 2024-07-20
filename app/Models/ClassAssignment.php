<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClassAssignment extends Model
{
    use HasFactory;
    protected $table = 'class_assignments';

    protected $fillable = [
        'class_year_id',
        'assignment_id',
        'duedate',
    ];

    protected $casts = [
        'duedate' => 'datetime',
    ];

    public function classYear(): BelongsTo
    {
        return $this->belongsTo(ClassYear::class);
    }

    public function assignment(): BelongsTo
    {
        return $this->belongsTo(Assignment::class);
    }

    public function studentAssignments(): HasMany
    {
        return $this->hasMany(StudentAssignment::class);
    }
}

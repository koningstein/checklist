<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EnrolmentClass extends Model
{
    use HasFactory;
    protected $table = 'enrolment_classes';
    protected $fillable = ['enrolment_id', 'class_year_id'];

    public function enrolment(): BelongsTo
    {
        return $this->belongsTo(Enrolment::class);
    }

    public function classYear(): BelongsTo
    {
        return $this->belongsTo(ClassYear::class);
    }

    public function studentAssignments(): HasMany
    {
        return $this->hasMany(StudentAssignment::class, 'enrolment_class_id');
    }
}

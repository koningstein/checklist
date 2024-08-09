<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Enrolment extends Model
{
    use HasFactory;
    protected $table = 'enrolments';
    protected $fillable = ['student_id', 'crebo_id', 'cohort_id', 'date', 'enrolment_status_id'];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function crebo(): BelongsTo
    {
        return $this->belongsTo(Crebo::class);
    }

    public function cohort(): BelongsTo
    {
        return $this->belongsTo(Cohort::class);
    }

    public function enrolmentStatus(): BelongsTo
    {
        return $this->belongsTo(EnrolmentStatus::class);
    }

    public function enrolmentClasses(): HasMany
    {
        return $this->hasMany(EnrolmentClass::class);
    }
}

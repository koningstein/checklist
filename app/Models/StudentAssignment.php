<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentAssignment extends Model
{
    use HasFactory;

    public function enrolmentClass(): BelongsTo
    {
        return $this->belongsTo(EnrolmentClass::class);
    }

    public function classAssignment(): BelongsTo
    {
        return $this->belongsTo(ClassAssignment::class);
    }

    public function assignmentStatus(): BelongsTo
    {
        return $this->belongsTo(AssignmentStatus::class, 'assignmentstatuses_id');
    }

    public function markedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'markedby_id');
    }
}

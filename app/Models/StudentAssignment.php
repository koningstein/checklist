<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentAssignment extends Model
{
    use HasFactory;
    protected $table = 'student_assignments';

    protected $fillable = [
        'enrolment_class_id',
        'class_assignment_id',
        'individual_assignment_id',
        'duedate',
        'assignment_status_id',
        'marked_by_id',
        'completed',
        'marked_at'
    ];

    protected $dates = ['duedate', 'marked_at'];

    public function enrolmentClass(): BelongsTo
    {
        return $this->belongsTo(EnrolmentClass::class);
    }

    public function classAssignment(): BelongsTo
    {
        return $this->belongsTo(ClassAssignment::class, 'class_assignment_id');
    }

    public function assignmentStatus(): BelongsTo
    {
        return $this->belongsTo(AssignmentStatus::class, 'assignment_status_id');
    }

    public function markedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'markedby_id');
    }

    // Relatie met Assignment (voor individuele opdrachten)
    public function individualAssignment(): BelongsTo
    {
        return $this->belongsTo(Assignment::class, 'individual_assignment_id');
    }
}

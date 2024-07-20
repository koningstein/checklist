<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AssignmentStatus extends Model
{
    use HasFactory;
    protected $table = 'assignment_statuses';
    protected $fillable = [
        'name'
    ];
    public function studentAssignments(): HasMany
    {
        return $this->hasMany(StudentAssignment::class, 'assignment_statuses_id');
    }
}

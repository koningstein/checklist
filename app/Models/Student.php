<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'studentNr'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function enrolments(): HasMany
    {
        return $this->hasMany(Enrolment::class);
    }

//    public function studentAssignments(): HasMany
//    {
//        return $this->hasMany(StudentAssignment::class);
//    }

    public function studentGuardians(): HasMany
    {
        return $this->hasMany(StudentGuardian::class);
    }
}

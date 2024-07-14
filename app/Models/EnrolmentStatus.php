<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EnrolmentStatus extends Model
{
    use HasFactory;

    protected $table = 'enrolment_statuses';
    protected $fillable = ['name'];

    public function enrolments(): HasMany
    {
        return $this->hasMany(Enrolment::class);
    }
}

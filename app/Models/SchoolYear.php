<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SchoolYear extends Model
{
    use HasFactory;

    protected $table = 'school_years';
    protected $fillable = [
        'name',
        'startdate',
        'enddate',
    ];

    public function classYears(): HasMany
    {
        return $this->hasMany(ClassYear::class);
    }
}

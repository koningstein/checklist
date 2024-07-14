<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SchoolClass extends Model
{
    use HasFactory;

    protected $table = 'school_classes';
    protected $fillable = [
        'name',
    ];

    public function classYears(): HasMany
    {
        return $this->hasMany(ClassYear::class);
    }
}

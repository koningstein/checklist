<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Period extends Model
{
    use HasFactory;

    protected $fillable = ['period'];

    public function modules(): HasMany
    {
        return $this->hasMany(Module::class);
    }

    public function learningSuboutcomeLevels(): HasMany
    {
        return $this->hasMany(LearningSuboutcomeLevel::class);
    }
}

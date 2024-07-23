<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningLevel extends Model
{
    use HasFactory;
    protected $table = 'learning_levels';

    protected $fillable = [
        'name',
        'description',
    ];
}

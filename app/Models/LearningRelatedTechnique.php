<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningRelatedTechnique extends Model
{
    use HasFactory;
    protected $table = 'learning_related_techniques';

    protected $fillable = [
        'name',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = [
        'ExerciseName',
        'GroupMuscle',
        'TargetMuscle',
        'Environment',
        'ProperForm'
    ];
}

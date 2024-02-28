<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Program;

class ProgramExercises extends Model
{
    protected $fillable = [
        'exercise',
        'group_muscle',
        'target_muscle',
        'sets',
        'reps',
        'weight',
        'program_id'
    ];

    public function program(){
        return $this->belongsTo(Program::class);
    }
    use HasFactory;
}

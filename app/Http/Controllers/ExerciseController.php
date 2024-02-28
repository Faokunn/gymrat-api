<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exercise;


class ExerciseController extends Controller
{
    public function index()
    {
        $exercises = Exercise::all()->groupBy('GroupMuscle');

        return response()->json(['exercises' => $exercises]);
    }

    public function show($groupMuscle)
    {
        $exercises = Exercise::where('GroupMuscle', $groupMuscle)->get();

        return response()->json(['exercises' => $exercises]);
    }
}

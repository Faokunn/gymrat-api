<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exercise;


class ExerciseController extends Controller
{
    public function index()
    {
        $exercise = Exercise::all();
        return view('exercise.index', compact('exercise'));
    }

    public function create()
    {
        return view('exercise.create');
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'ExerciseName' => 'required|unique:exercises,ExerciseName',
            'GroupMuscle' => 'required',
            'TargetMuscle' => 'required',
            'ProperForm' => 'required',
            'Environment' => 'required',
        ]);

        // Create the exercise if validation passes
        Exercise::create($request->all());

        // Flash a success message to the session
        session()->flash('success', 'Exercise created successfully.');

        // Redirect or perform other actions upon successful creation
        return redirect()->route('web.exercise.index');
    }

    public function edit(Exercise $exercise)
    {
        return view('exercise.edit', compact('exercise'));
    }

    public function update(Request $request, Exercise $exercise)
    {
        $exercise->update($request->all());
        return redirect()->route('web.exercise.index')->with('success', 'Exercise Updated successfully.');
    }

    public function destroy(Exercise $exercise)
    {
        $exercise->delete();
        return redirect()->route('web.exercise.index')->with('success', 'Exercise Deleted successfully.');
    }
}

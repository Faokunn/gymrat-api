<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProgramExercises;

class ProgramExercisesController extends Controller
{
    public function index(){
        $programexercises = ProgramExercises::all();
        return response() -> json(['programexercises' => $programexercises]);
    }
    public function store(Request $request){
        return ProgramExercises::create($request->all());
    }
    public function update(Request $request, $id){
        $programexercises = ProgramExercises::find($id);
        $programexercises -> update($request -> all());
        return response()-> json(['programexercises' => $programexercises]);
    }
    public function destroy($id){
        $programexercises = ProgramExercises::find($id);
        $programexercises -> delete();
        return response()-> json(['message' => 'Exercises Removed']);
    }

    public function show($program_id){
        $programexercises = ProgramExercises::where('program_id', $program_id)->get();
        
        if($programexercises->isEmpty()) {
            return response()->json(['message' => 'No xercises found for the specified program'], 404);
        }

        return response()->json(['programexercises' => $programexercises]);
    }
}

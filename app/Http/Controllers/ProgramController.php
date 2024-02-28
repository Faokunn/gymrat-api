<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\User;

class ProgramController extends Controller
{
    public function index(){
        return Program::with('programexercises')->get();
    }
    public function store(Request $request){
        $program = Program::create($request->all());
        if($request->has('programexercises')){
            $program->programexercises()->createMany($request->input('programexercises'));
        }
        return response()-> json([$program,201]);
    }
    public function update(Request $request, $id){
        $program = Program::find($id);
        $program -> update($request -> all());
        return response()-> json(['program' => $program]);
    }
    public function destroy($id){
        $program = Program::find($id);
        $program -> programexercises()->delete();
        $program -> delete();
        return response()-> json(['message' => 'Program Removed']);
    }

    public function show(Request $request, $user_id){
        $program = Program::where('user_id', $user_id)->first();
        if (!$program) {
            return response()->json(['error' => 'Program not found'], 404);
        }
        return response()->json(['program' => $program]);
    }
    
}

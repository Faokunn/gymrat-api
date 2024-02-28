<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chest;
use Illuminate\Support\Facades\DB;
class ChestController extends Controller
{
    public function index(){
        $chests = DB::select('
        SELECT COUNT(exercise) AS exercise_count, exercise AS exercise_name
        FROM chests
        GROUP BY exercise');

        return view('Chest', compact('chests'));
    }
    public function store(Request $request){
        return Chest::create($request->all());
    }
    public function update(Request $request, $id){
        $chest = Chest::find($id);
        $chest -> update($request -> all());
        return response()-> json(['chest' => $chest]);
    }
    public function destroy($id){
        $chest = Chest::find($id);
        $chest -> delete();
        return response()-> json(['message' => 'Exercises Removed']);
    }
}

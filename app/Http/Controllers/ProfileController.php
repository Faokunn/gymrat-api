<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        $profile = Profile::all();
        return response() -> json(['profiles' => $profile]);
    }
    public function store(Request $request){
        
    }
    public function update(Request $request, $id){
        
    }
    public function destroy($id){
        $profile = Profile::find($id);
        $profile -> delete();
        return response()-> json(['message' => 'Program Removed']);
    }
    public function show(Request $request, $user_id){
        $profile = Profile::all()->find($user_id);
        if (!$profile) {
            return response()->json(['error' => 'Proifle not found'], 404);
        }
        return response()->json(['profile' => $profile]);
    }
}

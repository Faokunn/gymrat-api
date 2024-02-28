<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserController extends Controller
{   
    public function index(){
        $users = User::with('profile', 'program')->get();
        return response()->json(['users' => $users]);
    }

    public function show(Request $request, $id){
        $user = User::with(['profile', 'program'])->find($id);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
        return response()->json(['user' => $user]);
    }

    public function register(Request $request){

        $validator = Validator::make($request->all(), [
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8|max:100',
            'confirm_password'=>'required|same:password'
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'message'=>'Validation Failed',
                'errors'=>true
            ],422);
        };
        
        $user=User::create([
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        
        if($request->has('program')){
            $user -> program()->create($request->input('program'));
        }
        $user -> profile()->create($request->input('profile'));
        
        return response()->json([
            'message'=>'Registration Succesful',
            'data'=>$user
        ],200);
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email'=>'required|email',
            'password'=>'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message'=>'Validation Failed',
                'errors'=>$validator->errors()
            ],422);
        };

        $user=User::where('email', $request->email)->first();

        if($user){
            if(Hash::check($request->password,$user->password)){
                $token=$user->createToken('auth-token')->plainTextToken;
                return response()->json([
                    'error'=>false,
                    'message'=>'Login Succesful',
                    'token'=>$token,
                    'data'=>$user
                ],200);
            }
            
            else{
                return response()->json([
                    'error'=>true,
                    'message'=>'Incorrect Password',
    
                ],400);
            }
        }
        else{
            return response()->json([
                'message'=>'Account Not Found',
                'error'=>true
            ],400);
        };
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message'=>'User Successfully logged out',
        ],200);
    }

    public function destroy($id){
        $user = User::find($id);
        $user -> delete();
        $user -> profile()->delete();
        $user -> program()->delete();
        return response()-> json(['message' => 'User Removed']);
    }
}


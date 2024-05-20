<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    //Function for register
    public function register(Request $request) {   
        if($request->name){       
            //Check if the email already exists
            $IsEmailExists = User::where('email', $request->email)->exists();
            if($IsEmailExists) {
                $success['status'] = 400;
                $success['message'] = 'Email is already taken. Please try with a new email..';
                return response()->json($success, 400);
            }
                //create register
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request['password']),
                    'api_token' => Str::random(60),
                ]);        
                //Check if register is created is not
                if($user){
                    $success['status'] = 200;
                    $success['message'] = 'Register Created Successfully..';
                    $success['data'] = [];
                    return response()->json($success, 200);
                } else {
                    $success['status'] = 400;
                    $success['message'] = 'Oops Something Wrong..';
                    $success['data'] = [];
                    return response()->json($success, 400);
                } 
        //Check first filled is required otherwise not insert data         
        } else {
            $success['status'] = 400;
            $success['message'] = 'First all fields';
            return response()->json($success, 400);
        }    
    }    

    //Function for user login
    public function login(Request $request) {
        $users = $request->only('email', 'password');        
        //Check if users is exit or not
        if(Auth::attempt($users)) {
            $user = Auth::user();            
            //generate JWT token with user details
            $token = JWTAuth::fromUser($user);    
            //Return response with token and user details
            return response()->json([
                    'token' => $token,
            ], 200);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Invalid credentials.',
                'data' => [],
            ], 400);
        }
    }

  //Function for changing password with email
  public function changePassword(Request $request) {
        //validation
        $request->validate([
            'email' => 'required|email',
            'old_password' => 'required|min:6',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ]);
        //Check if email is exit or not
        $user = User::where('email', $request->email)->first();
        //Check if the user exist or not
        if ($user) {
            //verify current password
            if (Hash::check($request->old_password, $user->password)) {
                //update the password
                $user->password = Hash::make($request->new_password);
                $user->update();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Password updated successfully.',
                ], 200);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Old password is incorrect.',
                ], 401);
            }
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found.',
            ], 404);
        }
    }
}
    
    

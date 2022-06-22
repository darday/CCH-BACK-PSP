<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        
        // var_dump(($credentials));
        if(!Auth::attempt($credentials)){
            return response([
                "message"=>"Usuario y/o contrase;a invalida",
                "response"=>true,
                "status"=>200
            ],422);
        }
        
        $user = Auth::user();
        $accessToken = $user->createToken('authToken')->accessToken;
        return response([
            "user"=>$user,
            "accessToken"=>$accessToken,
            
        ]);
    }

    public function register(Request $request){

        // return($request);
        // dd($request);
        $validatedData = $request->validate([
            'name'=>'required|max:255',
            'last_name'=>'required|max:255',
            'email'=>'required|email|unique:users',
            'ci'=>'required',
            'password'=>'required|confirmed'

        ]);

        $validatedData['password'] = Hash::make($request->password);
        $validatedData['rol'] = 'admin';
        // return($validatedData);

        $user = User::create($validatedData);
        $accessToken = $user->createToken('authToken')->accessToken;

        return response ([
            'user'=>$user,
            'accessToken'=>$accessToken
        ]);
    }

    public function logout(Request $request){
        $token= $request->user()->token();
        $token->revoke();
        return 'logged out'; // modify as per your need
    }
}

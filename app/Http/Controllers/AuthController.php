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
                "message"=>"Usuario y/o contraseña invalida",
                "response"=>false,
                "status"=>200
            ],200);
        }
        
        $user = Auth::user();
        $accessToken = $user->createToken('authToken')->accessToken;
        return response([
            "user"=>$user,
            "response"=>200,
            "accessToken"=>$accessToken,
            "success"=>true,
            "rol"=>$user->rol
            
        ]);
    }

    public function register(Request $request){

        // return($request);
        // dd($request);
        $validatedData = $request->validate([
            'name'=>'required|max:255',
            'last_name'=>'required|max:255',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed',
            'cellphone'=>'required'

        ]);

        $validatedData['password'] = Hash::make($request->password);
        $validatedData['rol'] = 'admin';
        // return($validatedData);

        $user = User::create($validatedData);
        $accessToken = $user->createToken('authToken')->accessToken;

        return response ([
            'user'=>$user,
            'accessToken'=>$accessToken,
            'messagge' => 'David Paca',
            'status' => 200
        ]);
    }

    public function logout(Request $request){
        $token= $request->user()->token();
        $token->revoke();
        return 'logged out'; // modify as per your need
    }
}

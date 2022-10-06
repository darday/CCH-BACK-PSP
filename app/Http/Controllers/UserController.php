<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function all_users(){
        return (User::all());
    }

    public function user_info($id){
        // return $id;
        $user = User::where('id', $id)->first();
        // var_dump($user);
        return($user);
        // $result = User::whereIn('id')
    }
}

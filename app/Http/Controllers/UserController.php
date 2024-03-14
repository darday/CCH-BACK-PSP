<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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

    public function user_guide_select()
    {
        $select_users_guide = DB::table('users')
        ->where('rol', '=', 'guide')
        ->get();
        return $select_users_guide;
    }
}

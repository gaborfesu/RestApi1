<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function regsiter(Request $request){
        $fields = $request->validate([
            'name' => 'required|string',
            'email'=>'required|string|unique:users,email',
            'password'=>'required|string|confirmed'
        ]);
        $user = User::create([
            'name'=> $fields['name'],
            'email'=>$fields['email'],
            'password'=> bcrypt($fields['password'])
        ]);
        $token = $user->createToken('ownToken')->plainTextToken;
        $resopons =[
            'user' => $user,
            'token' => $token
        ];
        return response($resopons,201);
    }
}

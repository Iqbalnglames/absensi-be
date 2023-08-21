<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function auth (Request $request)
    {
        $validator = Validator::make($request->all(),[
            'username' => 'required',  
            'password' => 'required',
        ]);
        if($validator->fails())
        {
            return response()->json($validator->errors(), 400);
        }

        $user = User::where('username', $request->username)->first();

        if(!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'succes' =>false,
                'message'=>'Invalid username or password.'
            ]);
        }
         
        return response()->json([
            'success'=> true,
            'message' => 'login success',
            'data' => $user,
            'token'=> $user->createToken('authToken')->accessToken
        ]);
    }
    public function logout ( Request $request )
    {
        $removeToken = $request->user()->token()->delete();
        if( $removeToken ){
            return response()->json([
                'success' => true,
                'message' =>'Logout Successfull!'
            ]);
        }
    }
}

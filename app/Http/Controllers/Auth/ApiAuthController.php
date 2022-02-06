<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Validator;


class ApiAuthController extends Controller
{
    //

    public function register(Request $request){

        $validator = Validator::make($request->all(),[
            'name' => 'required|min:4',
            'email' => 'required|unique:users|email',
            'password' => 'required',
            'confirmed_password' => 'required|same:password'
        ]);


        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }

        $user = User::create([
            'name' => $request['name'],
            'role' => 'user',
            'username' => $request['name'],
            'email' => $request['email'],
            'address' => 'Your Address',
            'phone' => 'Your Phone',
            'photo' => 'default.png',
            'password' => Hash::make($request['password']),
        ]);

        $accessToken = $user->createToken('authToken')->accessToken;

        return response(['user' => $user , 'accessToken' => $accessToken]);
    }


    public function login(Request $request){

        $user = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(!Auth::attempt($user)){
            return response()->json(['message' => 'Email or Password Error']);
        }

        $accessToken = Auth::user()->createToken('authToken')->accessToken;

        return response()->json(['user' => Auth::user() , 'accessToken' => $accessToken]);

    }


    public function logout(Request $request){
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Logout Successfully'
        ]);
    }
}

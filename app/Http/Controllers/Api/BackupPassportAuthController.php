<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class BackupPassportAuthController extends Controller
{

    public function register(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|min:4',
            'email' =>  'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        //if ($teste){
        //  return response()->json(["message" => "its not work !"], 200);
        // }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        //$token = $user->createToken('1234')->plainTextToken;
        //$token = $user->createToken('1234')->accessToken;


        return response()->json(['token' => $token], 200);

    }


    public function showUserInfo(){

        return response()->json(['user' => auth()->user()], 200);

    }

    public function login(Request $request){

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (auth()->attempt($data)){

            $token = auth()->user()->createToken('1234')->accessToken;

            return response()->json(['token' => $token, 'message' => "connecté"], 200);

        } else {

            return response()->json(['error' => 'error mauvais mdp'], 401); //<- changer le status
        }

    }

    public function logout(){

        auth()->user()->tokens()->delete();

        return response()->json([
            'status' => 'true',
            'message' => 'Logged out successfully',
        ]);

    }

}

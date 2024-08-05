<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class PassportAuthController extends Controller
{

    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required|min:4',
            'email' =>  'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);


        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);


        return response()->json([
            'status' => 'success',
            'message' => 'User Register successfully',
            'data' => []
        ]);


    }

    public function login(Request $request)
    {

        $request->validate([
            'email' =>  'required|email',
            'password' => 'required|min:6',
        ]);


        $user = User::where('email', $request->email)->first();


        if (!empty($user)) {

            if (Hash::check($request->password, $user->password)) {

                $token = $user->createToken('1234')->plainTextToken;

                return response()->json([
                    'status' => true,
                    'message' => 'Login successfully',
                    'token' => $token,
                    'data' => [],
                ]);

            } else {

                return response()->json([
                    'status' => 'error',
                    'message' => 'Wrong Password',
                ]);

            }


        } else {

            //utilisateur existe pas
            return response()->json([
                'status' => false,
                'message' => 'email does not exist',
                'data'=> []
            ]);

        }

    }

    public function profile(){

        $userData = auth()->user();

        return response()->json([
            'status' => true,
            'message' => 'Profile',
            'data' => $userData,
            'id' => auth()->user()->id
        ]);
    }

    public function logout(){
        auth()->user()->tokens()->delete();

        return response()->json([
            'status' => true,
            'message' => 'Logout successfully',
            'data' => array()
        ]);
    }


}

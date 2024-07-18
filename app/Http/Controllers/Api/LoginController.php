<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        $user = User::all();
        return response()->json($user, 200);
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->save();

        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user,
    ], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $cerdentials = request(['email','password']);
        if(!auth()->attempt($cerdentials)){

            return response()->json([
                'message'=>'login faield email or password is wrong',
            ],status:422);
        }

        $user = User::where('email' , $request->email)->first();
        $accessToken = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'message'=>'login successfull',
            'user'=>$user,
            'accessToken'=>$accessToken,
        ],status:200);
    }
}

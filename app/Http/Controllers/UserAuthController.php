<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    public function singup(Request $request){

        $name = $request->input('name');
        $email = ($request->input('email'));
        $password = $request->input('password');

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);

        $accessToken = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'User Account Created Successfully',
            'access_token' => $accessToken,
            'token_type' => 'Bearer',
            'user' => $user,
        ], 201);

    }

    public function login(Request $request)
{
    $email = strtolower($request->input('email'));
    $password = $request->input('password');

    $credentials = [
        'email' => $email,
        'password' => $password
    ];

    if (!Auth::attempt($credentials)) {
        return response()->json([
            'message' => 'Credenciales inválidas o no autorizado',
        ], 401);
    }

    $user = User::where('email', $request['email'])->firstOrFail();

    $accessToken = $user->createToken('auth_token')->plainTextToken;

    // Aquí guardamos el token en la sesión del usuario
    session(['auth_token' => $accessToken]);

    return response()->json([
        'access_token' => $accessToken,
        'token_type' => 'Bearer',
        'user' => $user
    ],200);
}    
}

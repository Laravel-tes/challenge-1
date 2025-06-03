<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function signUp(Request $request){
        try {
            $validated = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required:min:6',
            ]);
    
            $user = \App\Models\User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => bcrypt($validated['password']),
            ]);
    
            $token = $user->createToken('auth_token')->plainTextToken;
    
            return response()->json(['token' => $token], 201);

        } catch (\Throwable $th) {

            return response()->json(['message' => 'Something went wrog we are fixing for you'], 400);
        
        }

    }

    public function login(Request $request) {
        
        if(!auth()->attempt($request->only('email', 'password'))) {
            return response()->json(['message' => "Invalid credencials"], 401);
        }
        
        $token = auth()->user()->createToken('auth_token')->plainTextToken;
        return response()->json(['token' => $token], 200);
    }

}

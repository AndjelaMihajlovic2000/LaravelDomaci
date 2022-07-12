<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $user = User::where("email", $email)->first();

        if (!$user) {
            return response()->json([
                "error" => "Bad credentials"
            ], 400);
        }
        if (!Hash::check($password, $user->password)) {
            return response()->json([
                "error" => "Bad credentials"
            ], 400);
        }
        return response()->json([
            "user" => $user,
            "token" => $user->createToken($user->email)->plainTextToken
        ]);
    }

    public function register(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $name = $request->name;
        $user = User::where("email", $email)->first();
        if ($user) {
            return response()->json([
                "error" => "User already exists"
            ], 400);
        }

        $createdUser = User::create([
            "email" => $email,
            "name" => $name,
            "password" => Hash::make($password)
        ]);
        return response()->json([
            "user" => $createdUser,
            "token" => $createdUser->createToken($user->email)->plainTextToken
        ]);
    }


    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->noContent();
    }
}

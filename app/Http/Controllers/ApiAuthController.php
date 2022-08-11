<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use \App\Models\User;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isNull;

class ApiAuthController extends Controller
{
    public function register(Request $request)
    {
        // Validate request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:8',
            'mobile_no' => 'required|max:10|min:10',

        ]);
        // Return errors if validation error occur.
        if ($validator->fails()) {
            $errors = $validator->errors();

            return response()->json([
                'error' => $errors
            ], 400);
        }
        // Check if validation pass then create user and auth token. Return the auth token

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile_no' => $request->mobile_no,
            'password' => Hash::make($request->password),
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'role' => 'user'
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;
        $dept_id = $user->dept_id;
        $division_id = $user->division_id;
        $role = $user->role;
        if (isNull($dept_id) || isNull($division_id) || isNull($role)) {
            $dept_id = 0;
            $division_id = 0;
            $role = "user";
        }
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'username' => $request->name,
            'email' => $request->email,
            'mobile_no' => $request->mobile_no,
            'id' => $user->id,
            'role' => $role,
            'dept_id' => $dept_id,
            'division_id' => $division_id,
            'latitude' => $user->latitude,
            'longitude' => $user->longitude,
        ]);
    }
}

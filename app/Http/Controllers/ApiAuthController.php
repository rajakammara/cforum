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
            'mandal' => $request->mandal,
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
            'mandal' => $user->mandal,
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'mobile_no' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('mobile_no', $request->mobile_no)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            // throw ValidationException::withMessages([
            //     'mobile_no' => ['The provided credentials are incorrect.'],
            // ]);
            return response()->json([
                'status' => "error",
                'message' => 'Invalid Credentials'
            ]);
        }

        $token = $user->createToken("mobile")->plainTextToken;

        $dept_id = $user->dept_id;
        $division_id = $user->division_id;
        $role = $user->role;
        $dept_id = $user->dept_id == null ? 0 : $user->dept_id;
        $division_id = $user->division_id == null ? 0 : $user->division_id;

        return response()->json([
            'status' => "ok",
            'access_token' => $token,
            'token_type' => 'Bearer',
            'role' => $role,
            'user_id' => $user->id,
            'user_name' => $user->name,
            'mobile_no' => $user->mobile_no,
            'email' => $user->email,
            'can_forward_issue' => $user->can_forward_issue,
            'can_close_issue' => $user->can_close_issue,
            'is_deptuser' => $user->is_deptuser,
            'dept_id' => $dept_id,
            'division_id' => $division_id,
            'mandal' => $user->mandal,
            'latitude' => $user->latitude,
            'longitude' => $user->longitude,
        ]);
    }

    public function sanctumToken(Request $request)
    {
        $request->validate([
            'mobile_no' => 'required',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        $user = User::where('mobile_no', $request->mobile_no)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => "error",
                'message' => 'Invalid Credentials'
            ]);
        }

        $token = $user->createToken($request->device_name)->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
}

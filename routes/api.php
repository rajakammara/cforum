<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ComplaintController;
use App\Http\Resources\DeptCollection;
use App\Http\Resources\IssuesCollection;
use App\Http\Resources\ComplaintCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Issue;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Models\Complaint;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [ApiAuthController::class, "register"]);
Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'mobile_no' => 'required',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('mobile_no', $request->mobile_no)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'mobile_no' => ['The provided credentials are incorrect.'],
        ]);
    }

    $token = $user->createToken($request->device_name)->plainTextToken;

    return response()->json([
        'access_token' => $token,
        'token_type' => 'Bearer',
    ]);
});
Route::post('/login', function (Request $request) {
    $request->validate([
        'mobile_no' => 'required',
        'password' => 'required',        
    ]);

    $user = User::where('mobile_no', $request->mobile_no)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'mobile_no' => ['The provided credentials are incorrect.'],
        ]);
    }

    $token = $user->createToken("mobile")->plainTextToken;

    return response()->json([
        'access_token' => $token,
        'token_type' => 'Bearer',
        'user_type' => $user->role,
        'user_id'=>$user->id,
        'user_name'=>$user->name,
        'mobile_no'=>$user->mobile_no,
        'email'=>$user->email,
    ]);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/departments', function (Request $request) {
    $departments = \App\Models\Department::all();
    return new DeptCollection($departments);
});
Route::get('/issues', function (Request $request) {
    $dept_id = $request->dept_id;
    // $issue_data = Issue::where("dept_id", $dept_id)->get();
    // return response()->json(["data" => $issue_data]);

    return new IssuesCollection(Issue::where('dept_id', $dept_id)->get());
});
Route::post('/issues', function (Request $request) {
    $dept_id = $request->dept_id;
    // $issue_data = Issue::where("dept_id", $dept_id)->get();
    // return response()->json(["data" => $issue_data]);

    return new IssuesCollection(Issue::where('dept_id', $dept_id)->get());
});
Route::post("/getusercomplaints", function (Request $request) {
    //$complaint = Complaint::where("user_id",$id);
    $user_id = $request->userid;
    return new ComplaintCollection(Complaint::where('user_id', $user_id)->get());
});
Route::middleware('auth:sanctum')->post("/create_complaint", [ComplaintController::class, "store"]);

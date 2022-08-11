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
use function PHPUnit\Framework\isNull;
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
});
Route::post('/login', function (Request $request) {
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
    $dept_id = $user->dept_id==null?0:$user->dept_id;
    $division_id = $user->division_id==null?0:$user->division_id;
    
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
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Protected Routes
Route::middleware(['auth:sanctum'])->group(function () {

    // To Get All departments
    Route::get('/departments', function (Request $request) {
        $departments = \App\Models\Department::all();
        return new DeptCollection($departments);
    });

    // To Get all Issues
    Route::get('/issues', function (Request $request) {
        return new IssuesCollection(Issue::all());
    });

    // To Get All issues with department id
    Route::post('/issues', function (Request $request) {
        $dept_id = $request->dept_id;
        // $issue_data = Issue::where("dept_id", $dept_id)->get();
        // return response()->json(["data" => $issue_data]);

        return new IssuesCollection(Issue::where('dept_id', $dept_id)->get());
    });

    //Create New Complaint
    Route::post("/create_complaint", [ComplaintController::class, "store"]);

    // Get All complaints by department id
    Route::post("/getdeptcomplaints", function (Request $request) {
        $dept_id = $request->deptid;
        return new ComplaintCollection(Complaint::where('dept_id', $dept_id)->where('complaint_status',"=","Pending")->get());
    });

    // Get all complaints by user id
    Route::post("/getusercomplaints", function (Request $request) {
        //$complaint = Complaint::where("user_id",$id);
        $user_id = $request->userid;
        return new ComplaintCollection(Complaint::where('user_id', $user_id)->get());
    });

    // get all complaints
    Route::get("/getallcomplaints", function () {
        return new ComplaintCollection(Complaint::all());
    });

    // Fetch divisions
    Route::post(
        'fetchdivisions',
        [DivisionController::class, 'fetchDivisions']
    );
});

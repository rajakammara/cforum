<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ApiResponseController;
use App\Http\Controllers\ComplaintController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('/sanctum/token', [ApiAuthController::class], "sanctumToken");
Route::post('/login', [ApiAuthController::class, 'login']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Protected Routes
Route::middleware(['auth:sanctum'])->group(function () {

    //To Get Dashboard Stats
    Route::post('/getDashboardStats', [ApiResponseController::class, 'getDashboardStats']);

    // To Get All departments
    Route::get('/departments', [ApiResponseController::class, 'getAllDepartments']);

    // To Get all Issues
    Route::get('/issues', [ApiResponseController::class, 'getAllIssues']);

    // To Get All issues with department id
    Route::post('/issues', [ApiResponseController::class, 'getIssuesByDeptId']);

    //Create New Complaint
    Route::post("/create_complaint", [ComplaintController::class, "store"]);

    // get all complaints
    Route::get("/getallcomplaints", [ApiResponseController::class, 'getAllComplaints']);

    // Get All complaints by department id
    Route::post("/getdeptcomplaints", [ApiResponseController::class, 'getAllDeptComplaints']);

    // Get all complaints by user id
    Route::post("/getusercomplaints", [ApiResponseController::class, 'getAllUserComplaints']);



    // Fetch divisions
    Route::post('fetchdivisions', [DivisionController::class, 'fetchDivisions']);
    // Fetch user divisions
    Route::post('fetchuserdivisions', [DivisionController::class, 'fetch_user_Divisions']);
});

<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ApiResponseController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\MandalMasterController;
use App\Http\Controllers\VillageMasterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\VillageMaster;

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

    //To Get All App Users
    Route::get('/getAppUsers', [ApiResponseController::class, 'getAppUsers']);

    //To Get All Dept Users
    Route::get('/getDeptUsers', [ApiResponseController::class, 'getDeptUsers']);

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

    // get all pending complaints
    Route::get("/getallpendingcomplaints", [ApiResponseController::class, 'getAllPendingComplaints']);

    // get all pending Dept complaints
    Route::post("/getallpendingdeptcomplaints", [ApiResponseController::class, 'getAllPendingDeptComplaints']);

    // get all forwarded complaints
    Route::get("/getallforwardedcomplaints", [ApiResponseController::class, 'getAllForwardedComplaints']);

    // get all forwarded Dept complaints
    Route::post("/getallforwardeddeptcomplaints", [ApiResponseController::class, 'getAllForwardeddeptComplaints']);

    // get all closed complaints
    Route::get("/getallclosedcomplaints", [ApiResponseController::class, 'getAllClosedComplaints']);

    // get all closed dept complaints
    Route::post("/getallcloseddeptcomplaints", [ApiResponseController::class, 'getAllClosedDeptComplaints']);

    // Get All complaints by department id
    Route::post("/getdeptcomplaints", [ApiResponseController::class, 'getAllDeptComplaints']);
    
    // Get All complaints by department id and division id
    Route::post("/getdivisioncomplaints", [ApiResponseController::class, 'getAllDivisionComplaints']);

    // Get all complaints by user id
    Route::post("/getusercomplaints", [ApiResponseController::class, 'getAllUserComplaints']);

    // Get all complaints by user id
    Route::post("/getcomplaintbyid", [ApiResponseController::class, 'getComplaint']);

    // Update Complaint by department user
    Route::post("/updatecomplaint", [ApiResponseController::class, 'updateComplaint']);


    // Fetch divisions
    Route::post('fetchDivisions', [DivisionController::class, 'fetchDivisions']);
    // Fetch user divisions
    Route::post('fetchUserDivisions', [DivisionController::class, 'fetch_user_Divisions']);

    // Fetch divisions
    Route::post('fetchMandals', [MandalMasterController::class, 'fetchMandals']);
    // Fetch user divisions
    Route::post('fetchVillages', [VillageMasterController::class, 'fetchVillages']);

});
Route::get('fetchMandals', [MandalMasterController::class, 'fetchMandals']);
Route::get('fetchVillages', function(Request $request){
    $id = $request->query("id");
    $data['villages'] = VillageMaster::where('mandal_id', '=', $id)->get();
    return response()->json($data,200, [], JSON_UNESCAPED_UNICODE);
});
<?php

use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/privacy_policy', function () {
    return view('privacy');
});
Route::get('/terms_conditions', function () {
    return view('terms');
});

// Protected Routes
Route::middleware(['auth', 'auth:sanctum'])->group(
    function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('issues', IssueController::class);
        Route::resource('users', UserController::class);
        Route::resource('complaints', ComplaintController::class);
        Route::resource('reports', ReportController::class);

        //Fetch Complaints based on Department
        Route::get('/get-department-complaints/{id}', [ReportController::class, 'departmentComplaints'])->name('reports.department');

        // Reset User password in Admin Login
        Route::post('/reset-user-password', [UserController::class, 'resetUser'])->name('users.reset');

        // Fetch all divisions
        Route::post('fetchdivisions', [DivisionController::class, 'fetchDivisions']);
        // Fetch user divisions
        Route::post('fetchuserdivisions', [DivisionController::class, 'fetch_user_Divisions']);


        //Change Password
        Route::get('/change-password', [UserController::class, 'getChangePassword'])->name('users.getChangePassword');
        Route::post('/change-password', [UserController::class, 'postChangePassword'])->name('users.postChangePassword');
    }
);

require __DIR__ . '/auth.php';

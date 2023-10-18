<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});   

// Index api
Route::get('/index/{id}', [IndexController::class, 'show'])->whereNumber('id');
Route::get('/index/getJobs', [IndexController::class, 'getJobs']);

// Admin api
Route::get('/admin/initTable', [AdminController::class, 'getTable']);
Route::get('/admin/getTableData/{tableName}', [AdminController::class, 'showTableData']);


//_______________________________________ Jobs ____________________________________________________________

Route::post('/newjob/add', [JobController::class, 'store']);                                      // Create
Route::get('/index/{id}', [JobController::class, 'show'])->whereNumber('id');                     // Read
Route::put('/newjob/{id}', [JobController::class, 'update'])->whereNumber('id');                  // Update
Route::delete('/newjob/remove/{id}', [JobController::class, 'destroy'])->whereNumber('id');       // Delete

//_________________________________________________________________________________________________________

//_______________________________________ Users ___________________________________________________________

Route::post('/user/add', [UserController::class, 'store']);                                       // Create
Route::get('/user/{id}', [UserController::class, 'show'])->whereNumber('id');                     // Read
Route::put('/user/{id}', [UserController::class, 'update'])->whereNumber('id');                   // Update
Route::delete('/user/remove/{id}', [UserController::class, 'destroy'])->whereNumber('id');        // Delete

//_________________________________________________________________________________________________________

//_______________________________________ Companies _______________________________________________________

Route::post('/company/add', [CompanyController::class, 'store']);                                // Create
Route::get('/company/{id}', [CompanyController::class, 'show'])->whereNumber('id');              // Read
Route::put('/company/{id}', [CompanyController::class, 'update'])->whereNumber('id');            // Update
Route::delete('/company/remove/{id}', [CompanyController::class, 'destroy'])->whereNumber('id'); // Delete

//_________________________________________________________________________________________________________

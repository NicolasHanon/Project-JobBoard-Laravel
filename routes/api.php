<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ApplicationController;

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
Route::get('/admin/deleteRow/{id}/{table}', [AdminController::class, 'deleteRow']);
Route::post('/admin/addRow/{table}', [AdminController::class, 'addRow']);
Route::post('/admin/updateRow/{table}', [AdminController::class, 'updateRow']);

//User
Route::get('/user/getCompanyId/{userId}', [UserController::class, 'getCompanyId']);

//Job / Applications
Route::get('/application/getApplyJob/{userId}', [ApplicationController::class, 'getApplyJob']);
Route::get('/application/getApplyData/{userId}/{jobId}', [ApplicationController::class, 'getApplyData']);
Route::post('/application/updateMessage/{userId}/{jobId}', [ApplicationController::class, 'updateMessage']);

Route::get('/job/getJobListing/{companyId}', [JobController::class, 'getJobListing']);
Route::post('/job/updateJob/{jobId}', [JobController::class, 'updateJob']);

//_______________________________________ Jobs ___________________________________________________________________

Route::post('/newjob/add', [JobController::class, 'store']);                                             // Create
Route::get('/index/{id}', [JobController::class, 'show'])->whereNumber('id');                            // Read
Route::put('/newjob/{id}', [JobController::class, 'update'])->whereNumber('id');                         // Update
Route::delete('/newjob/remove/{id}', [JobController::class, 'destroy'])->whereNumber('id');              // Delete

//________________________________________________________________________________________________________________

//_______________________________________ Users __________________________________________________________________

Route::post('/user/add', [UserController::class, 'store']);                                              // Create
Route::get('/user/{id}', [UserController::class, 'show'])->whereNumber('id');                            // Read
Route::post('/user/update/{userId}', [UserController::class, 'update']);                                 // Update
Route::delete('/user/remove/{id}', [UserController::class, 'destroy'])->whereNumber('id');               // Delete

//________________________________________________________________________________________________________________

//_______________________________________ Companies ______________________________________________________________

Route::post('/companie/add', [CompanyController::class, 'store']);                                        // Create
Route::get('/companie/{id}', [CompanyController::class, 'show'])->whereNumber('id');                      // Read
Route::put('/companie/{id}', [CompanyController::class, 'update'])->whereNumber('id');                    // Update
Route::delete('/companie/remove/{id}', [CompanyController::class, 'destroy'])->whereNumber('id');         // Delete

//________________________________________________________________________________________________________________

//_______________________________________ Applications ___________________________________________________________

Route::post('/application/add', [ApplicationController::class, 'store']);                                // Create
Route::get('/application/{id}', [ApplicationController::class, 'show'])->whereNumber('id');              // Read
Route::put('/application/{id}', [ApplicationController::class, 'update'])->whereNumber('id');            // Update
Route::delete('/application/remove/{id}', [ApplicationController::class, 'destroy'])->whereNumber('id'); // Delete

//________________________________________________________________________________________________________________
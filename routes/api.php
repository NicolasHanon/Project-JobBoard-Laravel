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
Route::get('/admin/addRow/{jsonData}/{table}', [AdminController::class, 'addRow']);
Route::get('/admin/updateRow/{jsonData}/{table}', [AdminController::class, 'updateRow']);


//_______________________________________ Jobs ___________________________________________________________________

Route::post('/Newjob/add', [JobController::class, 'store']);                                             // Create
Route::get('/index/{id}', [JobController::class, 'show'])->whereNumber('id');                            // Read
Route::put('/Newjob/{id}', [JobController::class, 'update'])->whereNumber('id');                         // Update
Route::delete('/Newjob/remove/{id}', [JobController::class, 'destroy'])->whereNumber('id');              // Delete

//________________________________________________________________________________________________________________

//_______________________________________ Users __________________________________________________________________

Route::post('/user/add', [UserController::class, 'store']);                                              // Create
Route::get('/user/{id}', [UserController::class, 'show'])->whereNumber('id');                            // Read
Route::put('/user/{id}', [UserController::class, 'update'])->whereNumber('id');                          // Update
Route::delete('/user/remove/{id}', [UserController::class, 'destroy'])->whereNumber('id');               // Delete

//________________________________________________________________________________________________________________

//_______________________________________ Companies ______________________________________________________________

Route::post('/Company/add', [CompanyController::class, 'store']);                                        // Create
Route::get('/Company/{id}', [CompanyController::class, 'show'])->whereNumber('id');                      // Read
Route::put('/Company/{id}', [CompanyController::class, 'update'])->whereNumber('id');                    // Update
Route::delete('/Company/remove/{id}', [CompanyController::class, 'destroy'])->whereNumber('id');         // Delete

//________________________________________________________________________________________________________________

//_______________________________________ Applications ___________________________________________________________

Route::post('/Application/add', [ApplicationController::class, 'store']);                                // Create
Route::get('/Application/{id}', [ApplicationController::class, 'show'])->whereNumber('id');              // Read
Route::put('/Application/{id}', [ApplicationController::class, 'update'])->whereNumber('id');            // Update
Route::delete('/Application/remove/{id}', [ApplicationController::class, 'destroy'])->whereNumber('id'); // Delete

//________________________________________________________________________________________________________________
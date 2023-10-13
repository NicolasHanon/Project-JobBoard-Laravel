<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\JobController;

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

Route::get('/index/{id}', [IndexController::class, 'show'])->whereNumber('id');

Route::post('/newjob/add', [JobController::class, "store"]);

Route::post('/newjob/remove/{id}', [JobController::class, 'destroy'])->whereNumber('id');
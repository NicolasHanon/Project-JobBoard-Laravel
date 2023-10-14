<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/loginquimarche', function () {
    return view('login');
});

Route::get('/newjob', function () {
    return view('addjob');
});

Route::get('/register', function () {
    return view('signup');
});

Route::get('/user', function () {
    return view('user');
});

Route::get('/index', [IndexController::class, 'index']);

Route::get('/login', [AuthController::class, 'login'])->name('auth.login'); // pour nommé la route  
Route::post('/login', [AuthController::class, 'doLogin']);
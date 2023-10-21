<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;

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

Route::get('/', function () {
    return view('signin');
})->name('login');

Route::group(['middleware' => ['auth', 'user']], function() {
    Route::get('/newjob', function () {
        return view('addjob');
    })->name('newjob');
});

Route::get('/register', function () {
    return view('signup');
})->name('register');

Route::get('/user', function () {
    return view('user');
})->name('user');

Route::get('/myjobapplications', function () {
    return view('myjobapplications');
})->name('myjobapplications');

Route::get('/myjoblisting', function () {
    return view('myjoblisting');
})->name('myjoblisting');

Route::group(['middleware' => ['auth', 'admin']], function() {
    Route::get('/admin', function () {
        return view('admin');
    })->name('admin');
});

Route::group(['middleware' => ['auth', 'company']], function() {
    Route::get('/index', function () {
        return view('index');
    })->name('index');
});

// Route::group(['middleware' => ['auth', 'user']], function() {
    Route::get('/candidates/{job_id}', [JobController::class, 'viewCandidates'])->name('candidates');
// });



Route::get('/login', [AuthController::class, 'login'])->name('auth.login'); // pour nommé la route
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('/login', [AuthController::class, 'doLogin']);

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('auth.register');

Route::post('/register', [AuthController::class, 'register']);


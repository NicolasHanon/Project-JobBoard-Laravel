<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('signin');
    }

    public function doLogin(LoginRequest $request)
    {

    }
}

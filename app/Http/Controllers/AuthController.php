<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        return view('signin');
    }

    public function logout()
    {
        Auth::logout();
        return to_route('auth.login');
    }

    public function doLogin(LoginRequest $request)
    {
        $credentials = $request->validated();

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('index'));
        }
        return to_route('auth.login');
    }

    public function showRegistrationForm()
    {
        return view('signup');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lastname'  => 'required|string|max:255',
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|',
            'roleId'    => 'required|integer',
            'companyId' => 'required|integer',
            'phone'     => 'required|string|max:255',
            'more'      => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            // Validation a échoué, vous pouvez personnaliser la réponse ici
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->all();

        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return to_route('auth.login');
    }
}

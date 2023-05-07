<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function login(LoginFormRequest $request)
    {
        if (!Auth::attempt($request->only(['email', 'password']))){
            return redirect()->back()->withErrors('Usuário ou senha inválidos');
        }

        return to_route('serie.index');
    }

    public function logout()
    {
        Auth::logout();

        return to_route('login');
    }
}

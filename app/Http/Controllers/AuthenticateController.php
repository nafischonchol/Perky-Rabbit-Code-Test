<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;


class AuthenticateController extends Controller
{
    public function create()
    {
        return Inertia::render("Login");
    }

    public function store(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return Inertia::location("/");
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email'));
    }

    function logout()
    {
        auth()->logout();
        return to_route('login');
    }
}

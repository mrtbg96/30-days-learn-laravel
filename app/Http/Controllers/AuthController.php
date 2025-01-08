<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Auth;

use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function login(): View
    {
        return view('auth.login');
    }

    public function doLogin(Request $request): RedirectResponse
    {
        $attributes = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (! Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'These credentials do not match our records.'
            ]);
        }

        $request->session()->regenerate();

        return redirect()->route('jobs.index')->with('success', 'You logged in successfully!');
    }

    public function register(): View
    {
        return view('auth.register');
    }

    public function doRegister(Request $request): RedirectResponse
    {
        $attributes = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:64'],
            'email' => ['required', 'email', 'min:3', 'max:64', 'unique:users,email'],
            'password' => ['required', Password::min(8)->letters()->numbers(), 'confirmed']
        ]);

        $user = User::create($attributes);

        Auth::login($user);

        return redirect()->route('jobs.index')->with('success', 'You are successfully registered!');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'You logged out successfully!');
    }
}

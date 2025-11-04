<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Função de cadastro
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user); // Faz login automático após cadastro

        return redirect('/dashboard'); // redireciona após cadastro
    }

    // Função de login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Credenciais inválidas.',
        ]);
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    // Mostra o formulário de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Mostra o formulário de registro (CADASTRO)
    public function showRegisterForm()
    {
        return view('auth.register');
    }
    public function dashboard()
{
    return view('auth.dashboard');
}
}

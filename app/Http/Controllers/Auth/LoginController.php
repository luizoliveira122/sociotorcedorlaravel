<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Exibe o formulário de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Realiza o login do usuário
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/home'); // Redireciona para a página inicial após login
        }

        return back()->withErrors(['email' => 'Credenciais inválidas']);
    }

    // Realiza o logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}

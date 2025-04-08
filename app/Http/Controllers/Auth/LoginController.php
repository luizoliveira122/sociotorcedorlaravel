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
            if ($request->ajax()) {
                return response()->json(['success' => true], 200); // Respond with success for AJAX
            }
            return redirect()->intended('/home');
        }

        if ($request->ajax()) {
            return response()->json(['error' => 'Email ou senha incorretos'], 401); // Respond with error for AJAX
        }

        return back()->withErrors(['email' => 'Credenciais inválidas'])->with('error', 'Email ou senha incorretos');
    }

    // Realiza o logout
    public function logout(Request $request)
    {
        Auth::logout(); // Log out the user
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate the CSRF token
        return redirect('/login'); // Redirect to the login page
    }
}

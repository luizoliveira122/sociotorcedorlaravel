<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    // Exibe o formulário de solicitação de recuperação de senha
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    // Envia o link de recuperação de senha por e-mail
    public function sendResetLinkEmail(Request $request)
    {
        // Valida o e-mail
        $request->validate(['email' => 'required|email']);

        // Tenta enviar o link de reset de senha
        $response = Password::sendResetLink($request->only('email'));

        // Se o envio for bem-sucedido, informa o usuário
        return $response == Password::RESET_LINK_SENT
            ? back()->with('status', 'Link de recuperação enviado!')
            : back()->withErrors(['email' => 'O e-mail fornecido não existe no sistema']);
    }
}

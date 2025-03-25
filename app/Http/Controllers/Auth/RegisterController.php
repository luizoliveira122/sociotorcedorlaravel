<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // Exibe o formulário de registro
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Realiza o registro do novo usuário
    public function register(Request $request)
    {
        // Validação dos dados recebidos
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'cpf' => 'required|string|max:14',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'telefone' => 'required|string',
            'data_nascimento' => 'required|date',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Criação do novo usuário
        $user = new User;
        $user->name = $request->name; // Atribui o nome
        $user->cpf = $request->cpf; // Atribui o CPF
        $user->email = $request->email; // Atribui o email
        $user->password = Hash::make($request->password); // Criptografa a senha
        $user->telefone = $request->telefone; // Atribui o número de telefone
        $user->data_nascimento = $request->data_nascimento; // Atribui a data de nascimento
        $user->perfil = 'torcedor'; // Define o perfil como "torcedor"
        $user->save();

        // Faz login automaticamente após o registro
        Auth::login($user);

        // Redireciona para a página inicial após o registro
        return redirect('/home');
    }

}

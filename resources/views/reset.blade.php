<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinir Senha</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.6.1/imask.min.js"></script>

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative; /* Necessário para o ::before */
            color: #fff;
            font-family: Arial, sans-serif;
            overflow: hidden; /* Evita vazamento do efeito */
        }

        /* Criar camada de desfoque */
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('img/camisa-fundo.png'); /* Mantém a imagem */
            background-size: cover;
            background-position: center;
            filter: blur(10px); /* Aplica o desfoque */
            z-index: -1; /* Coloca atrás do conteúdo */
        }

        .container {
            display: flex;
            background-color: #0f0f0f; /* Preto sólido */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            overflow: hidden;
        }

        .login-container {
            padding: 20px;
            width: 300px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center; /* Centraliza o conteúdo */
        }

        .login-container h2 {
            margin-bottom: 20px;
        }

        .login-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
        }

        .login-container button {
            width: 100%; /* Ajusta a largura do botão */
            padding: 10px; /* Ajusta o padding do botão */
            background-color: #920101;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
        }

        .login-container button:hover {
            background-color: #ff0000;
        }

        .forgot-password-link {
            align-self: flex-start;
            margin-top: 10px; /* Aumenta o espaço acima do link */
            margin-bottom: 20px;
            color: #b1b1b1;
            text-decoration: none;
        }

        .forgot-password-link:hover {
            text-decoration: underline;
        }

        .register-link {
            margin-top: 20px;
            color: #fff;
            text-decoration: none;
        }

        .register-link:hover {
            text-decoration: underline;
        }

        .image-container {
            width: 300px;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px; /* Add padding to create space */
        }

        .image-container img {
            max-width: 100%;
            height: auto;
            border-radius: 0px;
        }

        #senha-container {
            background-color: #a8a8a8;
            color: #000;
            padding: 20px;
            margin-top: 20px;
            border-radius: 10px;
            width: 100%;
            text-align: center;
            display: none; /* Initially hidden */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <h2>Redefinir Senha</h2>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                
                <label for="email">Email:</label>
                <input type="email" name="email" value="{{ old('email') }}" required>

                <label for="password">Nova Senha:</label>
                <input type="password" name="password" required>

                <label for="password_confirmation">Confirmar Nova Senha:</label>
                <input type="password" name="password_confirmation" required>

                <button type="submit">Redefinir Senha</button>
            </form>

            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <a href="{{ route('login') }}" class="register-link">Voltar para Login</a>
        </div>        
        <div class="image-container">
            <img src="img/login.png" alt="Side Image"> 
        </div>
    </div>
</body>
</html>

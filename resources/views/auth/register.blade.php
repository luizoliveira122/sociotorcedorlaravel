<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
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
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <h2>Preencha os seus dados para prosseguir com o cadastro</h2>
            <!-- Formulário de Registro -->
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <!-- Campo Nome -->
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="name" placeholder="Nome Completo" required>

                <!-- Campo CPF -->
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" placeholder="000.000.000-00" required>

                <!-- Campo Email -->
                <label for="email">Email:</label>
                <input type="email" name="email" placeholder="Email" required>

                <!-- Campo Senha -->
                <label for="senha">Senha:</label>
                <input type="password" name="password" id="senha" placeholder="Senha" required minlength="6">

                <!-- Campo Confirmar Senha -->
                <label for="confirmarSenha">Confirmar Senha:</label>
                <input type="password" name="password_confirmation" id="confirmarSenha" placeholder="Confirmar Senha" required oninput="validarSenha()">

                <!-- Campo Telefone -->
                <label for="telefone">Número de Telefone:</label>
                <input type="tel" id="telefone" name="telefone" placeholder="(XX) XXXXX-XXXX" required>

                <!-- Campo Data de Nascimento -->
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" name="data_nascimento" required max="2006-12-31">


                <!-- Botão de envio -->
                <button type="submit">Registrar</button>
            </form>

            <a href="{{ route('login') }}" class="register-link">Já tem uma conta? Faça login</a> <!-- Link para login -->
        </div>        
        <div class="image-container">
            <img src="img/login.png" alt="Side Image"> 
        </div>
    </div>

    <script>
        // Aplicando máscara ao CPF
        IMask(document.getElementById("cpf"), {
            mask: "000.000.000-00"
        });

        // Aplicando máscara ao telefone
        IMask(document.getElementById("telefone"), {
            mask: "(00) 00000-0000"
        });

        // Função para validar se as senhas coincidem
        function validarSenha() {
            let senha = document.getElementById("senha").value;
            let confirmarSenha = document.getElementById("confirmarSenha").value;
            document.getElementById("confirmarSenha").setCustomValidity(senha !== confirmarSenha ? "As senhas não coincidem" : "");
        }
    </script>
</body>
</html>

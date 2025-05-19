<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Controle</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: white;
            position: relative; /* Necessário para o ::before */
            overflow: hidden; /* Evita vazamento do efeito */
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('img/camisa-fundo.png'); /* Caminho da imagem */
            background-size: cover;
            background-position: center;
            filter: blur(10px); /* Aplica o desfoque */
            z-index: -1; /* Coloca atrás do conteúdo */
        }

        header {
            background-color: black;
            color: white;
            padding: 10px 20px;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: rgba(255, 255, 255, 0.9); /* Fundo semi-transparente */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        h1 {
            color: #cc0000;
            text-align: center;
        }

        .menu {
            margin-top: 20px;
        }

        .menu a {
            display: block;
            text-decoration: none;
            color: white;
            background-color: #cc0000;
            padding: 10px;
            margin-bottom: 10px;
            text-align: center;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .menu a:hover {
            background-color: #810000;
        }
    </style>
</head>
<body>
    <header>
        <h3>Painel de Controle - Administrador</h3>
    </header>
    <div class="container">
    <h1>Bem-vindo, {{ Auth::user()->name }}!</h1>
    <div class="menu">
    <a href="{{ route('admin.noticias') }}">Gerenciar Notícias</a>
    <a href="{{ route('home') }}">Voltar</a>
</div>
</div>
</body>
</html>
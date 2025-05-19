<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Notícias</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: white;
            position: relative;
            overflow: hidden;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('img/camisa-fundo.png');
            background-size: cover;
            background-position: center;
            filter: blur(10px);
            z-index: -1;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        h1 {
            color: #cc0000;
            text-align: center;
        }

        form label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        form input, form textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        form button {
            margin-top: 15px;
            background-color: #cc0000;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        form button:hover {
            background-color: #810000;
        }
    </style>
</head>
<body>
    <header style="background-color: black; color: white; padding: 10px 20px; text-align: center;">
        <h3>Painel de Controle - Notícias</h3>
    </header>
    <div class="container">
        <h1>Gerenciar Notícias</h1>
        <form action="{{ route('publicacoes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label>Título:</label>
            <input type="text" name="titulo" required><br>

            <label>Texto:</label>
            <textarea name="texto" required></textarea><br>

            <label>Foto (opcional):</label>
            <input type="file" name="foto" accept="image/*"><br>

            <button type="submit">Publicar</button>
            <button type="button" style="background-color: #cc0000; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                <a href="{{ route('admin.dashboard') }}" style="text-decoration: none; color: white;">Voltar</a>
            </button>
        </form>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comentários - Clube Vasco da Gama</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 0;
        }

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

        header {
            background-color: black;
            color: white;
            text-align: center;
            padding: 20px 0;
            font-size: 24px;
            width: 100%;
            box-sizing: border-box;
            position: relative;
        }

        header img {
            width: 100px;
            height: 80px;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
        }

        header img:first-child {
            left: 20px;
        }

        header img:last-child {
            right: 20px;
        }

        h3 {
            margin: 0 120px;
            padding: 0;
            display: inline-block;
        }

        .container {
            width: 70%;
            margin: auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .comment-box {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
            box-sizing: border-box;
        }

        .comment-button {
            background-color: #cc0700;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            display: block;
            margin: 0 auto;
        }

        .comment-button:hover {
            background-color: #990000;
        }

        .theme-filters {
            text-align: center;
            margin-bottom: 20px;
        }

        .theme-button {
            padding: 10px 20px;
            background-color:rgb(0, 112, 204);
            color: white;
            text-decoration: none;
            margin: 0 10px;
            border-radius: 5px;
            font-size: 16px;
        }

        .theme-button:hover {
            background-color: #990000;
        }

        .comments-list {
            margin-top: 30px;
        }

        .comment {
            background-color: #f9f9f9;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .comment p {
            margin: 0;
            font-size: 16px;
        }

        .comment .author {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .delete-btn {
            background-color: transparent;
            border: none;
            color: #cc0700;
            font-size: 18px;
            cursor: pointer;
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .delete-btn:hover {
            color: #990000;
        }

        @media (max-width: 768px) {
            .container {
                width: 90%;
                padding: 15px;
            }

            h2 {
                font-size: 20px;
            }

            .comment-box {
                font-size: 14px;
            }

            .comment-button {
                font-size: 14px;
                padding: 8px 16px;
            }

            .comment {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            header img {
                width: 80px;
                height: 60px;
            }

            h3 {
                font-size: 18px;
            }

            .comment-box {
                height: auto;
            }
        }
    </style>
</head>
<body>
<header>
    <h3>Sócio Gigante Club de Regatas Vasco da Gama</h3>
</header>

<div class="container">
    <h2>Deixe seu Comentário</h2>

    <!-- Filtros de Tema -->
    <div class="theme-filters">
        <h2>Filtrar</h2>
        <a href="{{ route('comments.index', ['theme' => 'contratacoes']) }}" class="theme-button">Contratações</a>
        <a href="{{ route('comments.index', ['theme' => 'jogos']) }}" class="theme-button">Jogos</a>
        <a href="{{ route('comments.index', ['theme' => 'outros']) }}" class="theme-button">Outros</a>
        <a href="{{ route('comments.index') }}" class="theme-button">Todos</a> <!-- Para mostrar todos os comentários -->
    </div>

    <!-- Caixa de Comentário -->
    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <textarea name="text" class="comment-box" rows="4" placeholder="Escreva seu comentário aqui..."></textarea>
        
        <!-- Select de Temas -->
        <select name="theme" class="comment-box">
            <option value="" disabled selected>Escolha um tema</option>
            <option value="contratacoes">Contratações</option>
            <option value="jogos">Jogos</option>
            <option value="outros">Outros...</option>
        </select>

        <button type="submit" class="comment-button">Adicionar Comentário</button>
    </form>

    <div class="comments-list">
        @foreach ($comments as $comment)
            <div class="comment">
                <p class="author">{{ $comment->user->name }} (Tema: {{ $comment->theme }})</p>
                <p>{{ $comment->text }}</p>

                <!-- Exibe a lixeira apenas para administradores -->
                @if(auth()->user() && auth()->user()->perfil == 'administrador')
                    <form action="{{ route('comments.destroy', $comment) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button class="delete-btn" type="submit">🗑️</button>
                    </form>
                @endif
            </div>
        @endforeach
    </div>
</div>
</body>
</html>

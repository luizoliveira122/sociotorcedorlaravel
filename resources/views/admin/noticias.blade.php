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
            overflow-x: hidden;
            overflow-y: auto;
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

        @media (max-width: 768px) {
            .container {
                width: 90%;
                padding: 10px;
            }

            h1 {
                font-size: 1.5em;
            }

            form input, form textarea {
                font-size: 1em;
            }

            form button {
                width: 100%;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <header style="background-color: black; color: white; padding: 10px 20px; text-align: center;">
        <a href="{{ route('home') }}" style="color: white; text-decoration: none;"> <!-- Add link to home -->
            <h3>Club de Regatas Vasco da Gama</h3>
        </a>
    </header>
    <div class="container">
        <h1>Adicionar Postagens</h1>
        <form action="{{ route('publicacoes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label>Título:</label>
            <input type="text" name="titulo" required><br>

            <label>Texto:</label>
            <textarea name="texto" required></textarea><br>

            <button type="submit">Publicar</button>
            <button type="button" onclick="window.location.href='{{ route('home') }}'" style="background-color: #cc0000; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                Voltar
            </button>
        </form>
    </div>
    <div class="container">
        <h1>Todas Postagens</h1>
        @if(session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif
        @foreach($noticias as $noticia)
        <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px; border-radius: 5px;">
            <h3>{{ $noticia->titulo }}</h3>
            <p>{{ $noticia->texto }}</p>
            <small>Publicado em: {{ $noticia->created_at->format('d/m/Y H:i') }}</small>
            <form action="{{ route('publicacoes.destroy', $noticia->id) }}" method="POST" style="margin-top: 10px;">
                @csrf
                @method('DELETE')
                <button type="submit" style="background-color: red; color: white; padding: 5px 10px; border: none; border-radius: 5px; cursor: pointer;">
                    Excluir
                </button>
            </form>
        </div>
    @endforeach
    </div>
</body>
</html>
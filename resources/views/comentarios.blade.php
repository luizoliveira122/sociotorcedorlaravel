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
            position: fixed;
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


        header {
            background-color: black;
            color: white;
            text-align: center;
            padding: 1px 0;
            font-size: 24px;
            display: flex;
            align-items: center;
            justify-content: center; /* Center-align the header content */
            padding: 10px 20px;
            position: relative;
        }

        header img {
            width: 100px;
            height: 80px;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
        }

        .user-dropdown {
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            text-align: right;
        }

        h3 {
            margin: 0;
            padding: 0;
            text-align: center; /* Ensure text is centered */
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
            font-family: sans-serif;
        }

        .theme-filters h2 {
        margin-bottom: 0.5rem;
        font-size: 1.2rem;
        }

        .theme-select {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #fff;
            font-size: 1rem;
            color: #333;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg fill='gray' viewBox='0 0 24 24' width='18' height='18' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M7 10l5 5 5-5z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 18px;
            transition: border-color 0.3s ease;
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

        .dropdown-content {
            display: none; /* Hide dropdown by default */
            position: absolute;
            right: 0;
            background-color: black;
            min-width: 160px;
            z-index: 1;
        }

        .dropdown-content.active {
            display: block; /* Show dropdown when active */
        }

        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            background-color: #cc0000; /* Red button background */
            text-align: center;
            border-radius: 5px;
        }

        .dropdown-content a:hover {
            background-color: #810000; /* Darker red on hover */
            color: white;
        }

        .user-dropdown span {
            cursor: pointer;
        }

        .user-dropdown .arrow {
            margin-left: 5px;
            font-size: 12px;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .user-dropdown .arrow.active {
            transform: rotate(180deg); /* Rotate arrow when active */
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
        <a href="{{ route('home') }}" style="color: white; text-decoration: none;"> <!-- Add link to home -->
            <h3>Club de Regatas Vasco da Gama</h3>
        </a>
        <div class="user-dropdown">
            <span>Olá, {{ Auth::user() ? explode(' ', Auth::user()->name)[0] : 'Usuário' }}</span><br> <!-- Display user's first name -->
            <span>{{ Auth::user() ? Auth::user()->perfil : '' }}</span>
            <span class="arrow" onclick="toggleDropdown()">▼</span>
            <div class="dropdown-content" id="dropdown-content">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </header>

    <div class="container" style="padding: 0; border-radius: 8px; overflow: hidden;">
    <img src="{{ asset('img/torcida.jpg') }}" alt="Banner de Comentários" style="width: 100%; height: 200px; object-fit: cover; display: block; margin: 0;">
    <h2 style="margin-top: 20px;">Deixe seu Comentário</h2>

    <!-- Caixa de Comentário -->
    <form action="{{ route('comments.store') }}" method="POST">
        @csrf

        <select name="theme" class="comment-box">
            <option value="" disabled selected>Escolha um tema</option>
            <option value="contratacoes">Contratações</option>
            <option value="jogos">Jogos</option>
            <option value="outros">Outros</option>
        </select>
        <textarea name="text" class="comment-box" rows="4" placeholder="Escreva seu comentário aqui..."></textarea>

        <button type="submit" class="comment-button">Adicionar Comentário</button>
    </form>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>        
    <div class="theme-filters">
        <h2>Filtrar</h2>
        <form action="{{ route('comments.index') }}" method="GET">
            <select name="theme" class="theme-select" onchange="this.form.submit()">
                <option value="" disabled selected>Escolha um tema</option>
                <option value="contratacoes" {{ request('theme') == 'contratacoes' ? 'selected' : '' }}>Contratações</option>
                <option value="jogos" {{ request('theme') == 'jogos' ? 'selected' : '' }}>Jogos</option>
                <option value="outros" {{ request('theme') == 'outros' ? 'selected' : '' }}>Outros</option>
                <option value="" {{ request('theme') == null ? 'selected' : '' }}>Todos</option>
            </select>
        </form>
    </div>

    <div class="comments-list">
        @foreach ($comments->sortByDesc('created_at') as $comment) <!-- Sort comments by most recent -->
            <div class="comment">
                <p class="author">{{ $comment->user->name }}</p>
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
<script>
    function toggleDropdown() {
        const dropdownContent = document.getElementById('dropdown-content');
        const arrow = document.querySelector('.user-dropdown .arrow');
        dropdownContent.classList.toggle('active'); // Toggle dropdown visibility
        arrow.classList.toggle('active'); // Rotate arrow
    }

    document.addEventListener('click', function (event) {
            const dropdownContent = document.getElementById('dropdown-content');
            const arrow = document.querySelector('.user-dropdown .arrow');
            const isClickInside = document.querySelector('.user-dropdown').contains(event.target);

            if (!isClickInside) {
                dropdownContent.classList.remove('active');
                arrow.classList.remove('active');
            }
        });
</script>
</body>
</html>

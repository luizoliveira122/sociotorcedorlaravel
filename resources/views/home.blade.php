<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club de Regatas Vasco da Gama</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: white;
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

        .user-dropdown {
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            text-align: right;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: black;
            min-width: 160px;
            z-index: 1;
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

        .user-dropdown .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: black;
            min-width: 160px;
            z-index: 1;
        }

        .user-dropdown .dropdown-content.active {
            display: block;
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
            transform: rotate(180deg);
        }

        h3 {
            margin: 0;
            padding: 0;
            text-align: center; /* Ensure text is centered */
        }

        .content {
            display: flex;
            justify-content: space-around;
            padding: 20px;
            margin-top: 20px;
        }

        .card {
            background-color: #fffefe;
            padding: 20px; /* Espaçamento interno */
            margin: 20px; /* Espaçamento externo */
            border-radius: 8px;
            width: 90%; /* Ajuste para ocupar 90% da largura */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2), 0 6px 20px rgba(0, 0, 0, 0.19);
            text-align: center;
            border: 2px solid black;
        }

        .card h4 {
            margin-bottom: 15px;
            font-size: 22px;
            
        }

        .card button {
            background-color: #cc0000;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .card button:hover {
            background-color: #810000;
        }

        .carousel-container {
            display: flex;
            overflow: hidden;
            position: relative;
            width: 90%;
            max-width: 1200px;
            margin: 40px auto;
        }

        .carousel {
            display: flex;
            transition: transform 0.5s ease-in-out;
            gap: 20px;
        }

        .carousel-card {
            flex: 0 0 33.33%;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            padding: 10px;
        }

        .carousel-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }

        @media (max-width: 768px) {
            .content {
                flex-direction: column;
                align-items: center;
            }

            .card {
                width: 90%;
                margin-bottom: 20px;
            }

            .carousel-card {
                flex: 0 0 100%;
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

            .card h4 {
                font-size: 20px;
            }

            .card button {
                font-size: 14px;
                padding: 8px 16px;
            }
        }

            .postagens-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            margin-top: 20px;
        }

        .postagem-card {
            background-color:rgb(233, 233, 233); /* Fundo vermelho */
            border: 1px solidrgb(196, 195, 195); /* Borda mais escura */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 15px;
            width: 300px;
            text-align: center;
            color: white; /* Texto branco */
            transition: transform 0.3s, box-shadow 0.3s; /* Suaviza o efeito de hover */
        }

        .postagem-card:hover {
            transform: scale(1.05); /* Aumenta o tamanho do card */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Aumenta a sombra */
            cursor: pointer; /* Mostra o cursor de clique */
        }

        .postagem-card h3 {
            color: rgb(180, 2, 2); /* Título em branco */
            font-size: 1.2em;
            margin-bottom: 10px;
        }

        .postagem-card p {
            font-size: 0.9em;
            color:rgb(0, 0, 0); /* Texto em cinza claro */
            margin-bottom: 10px;
        }

        .postagem-card small {
            font-size: 0.8em;
            color: #f1f1f1; /* Texto menor em cinza claro */
        }
    
        
    </style>
</head>

<body>
    <header>
        <a href="{{ route('home') }}" style="color: white; text-decoration: none;"> <!-- Add link to home -->
            <h3>Club de Regatas Vasco da Gama</h3>
        </a>
        <div class="user-dropdown">
            <span>Olá, {{ explode(' ', Auth::user()->name)[0] }}</span><br>
            <span>{{ Auth::user()->perfil }}</span>
            <span class="arrow" onclick="toggleDropdown()">▼</span>
            <div class="dropdown-content" id="dropdown-content">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>
                @if(Auth::user()->perfil === 'administrador') <!-- Show admin panel link only for administrators -->
                    <a href="{{ route('admin.noticias') }}">Painel de Controle</a>
                @endif
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </header>

    <div class="content">
        <div class="card">
            <h4>Gerar Certificado</h4>
            <p>Crie e adiquira seu certificado de torcedor honorário do Club de Regatas Vasco da Gama</p>
            <a href="{{ route('certificados.index') }}" class="btn-certificado"> <!-- Add link to Certificados -->
                <button>Gerar Certificado</button>
            </a>
        </div>

        <div class="card">
            <h4>Interagir com o Clube</h4>
            <p>Nesta área, você pode deixar um comentário para outros torcedores e para a diretoria do clube verem.</p>
            <a href="{{ route('comments.index') }}" class="btn-interagir">
                <button>Interagir</button>
            </a>
        </div>
    </div>

    <div class="content">
    <div class="card" style="width: 90%;">
        <h4>Últimas Postagens</h4>
        <div class="postagens-container">
            @foreach($ultimasNoticias as $noticia)
                <div class="postagem-card" onclick="abrirPopup(`{{ addslashes($noticia->titulo) }}`, `{{ addslashes($noticia->texto) }}`)">
                    <h3>{{ $noticia->titulo }}</h3>
                    <p>{{ Str::limit($noticia->texto, 100) }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        function toggleDropdown() {
            const dropdownContent = document.getElementById('dropdown-content');
            const arrow = document.querySelector('.user-dropdown .arrow');
            dropdownContent.classList.toggle('active');
            arrow.classList.toggle('active');
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

            function abrirPopup(titulo, texto) {
            document.getElementById('popup-titulo').textContent = titulo;
            document.getElementById('popup-texto').textContent = texto;
            document.getElementById('noticia-popup').style.display = 'block';
            document.getElementById('popup-overlay').style.display = 'block';
        }

        function fecharPopup() {
            document.getElementById('noticia-popup').style.display = 'none';
            document.getElementById('popup-overlay').style.display = 'none';
        }
    </script>

    <!-- Popup para exibir a notícia completa -->
    <div id="noticia-popup" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); z-index: 1000; width: 80%; max-width: 600px; text-align: center;">
        <h3 id="popup-titulo" style="margin-top: 0; color: #cc0000;"></h3>
        <p id="popup-texto" style="color: #333; text-align: center;"></p>
        <button onclick="fecharPopup()" style="background-color: #cc0000; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; display: block; margin: 20px auto;">Fechar</button>
    </div>

    <!-- Overlay para o popup -->
    <div id="popup-overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 999;" onclick="fecharPopup()"></div>
</body>

</html>
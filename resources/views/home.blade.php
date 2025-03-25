<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sócio Gigante - Vasco da Gama</title>
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
            justify-content: space-between;
            padding: 10px 20px;
        }

        header img {
            width: 100px;
            height: 80px;
        }

        .user-dropdown {
            position: relative;
            display: inline-block;
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
        }

        .dropdown-content a:hover {
            background-color: #ddd;
            color: black;
        }

        .user-dropdown:hover .dropdown-content {
            display: block;
        }

        h3 {
            margin: 0 10px;
        }

        .content {
            display: flex;
            justify-content: space-around;
            padding: 20px;
            margin-top: 20px;
        }

        .card {
            background-color: #fffefe;
            padding: 20px;
            border-radius: 8px;
            width: 45%;
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
    </style>
</head>

<body>
    <header>
        <img src="img/cruz-header.png" alt="Imagem Esquerda">
        <h3>Sócio Gigante Club de Regatas Vasco da Gama</h3>
        <div class="user-dropdown">
            <span>Olá, {{ Auth::user()->name }}</span><br>
            <span>{{ Auth::user()->perfil }}</span>
            <div class="dropdown-content">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>
            </div>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </header>

    <div class="content">
        <div class="card">
            <h4>Gerar Certificado</h4>
            <p>Crie e adiquira seu certificado de sócio gigante do Vasco da Gama.</p>
            <button>Gerar Certificado</button>
        </div>

        <div class="card">
            <h4>Interagir com o Clube</h4>
            <p>Nesta área, você pode deixar um comentário para outros torcedores e para a diretoria do clube verem.</p>
            <a href="{{ route('comments.index') }}" class="btn-interagir">
                <button>Interagir</button>
            </a>
        </div>
    </div>

    <div class="carousel-container">
        <div class="carousel" id="carousel">
            <div class="carousel-card">
                <img src="img/mosaico2.jpg" alt="Imagem 1">
                <p>Mosaico da Torcida para os torcedores ilustres do clube e no centro o maior ídolo Roberto Dinamite"</p>
            </div>
            <div class="carousel-card">
                <img src="img/carta.jpg" alt="Imagem 2">
                <p>A "Resposta Histórica" foi uma carta enviada pelo Vasco em 1924 à Associação Metropolitana de Esportes Atléticos (AMEA), recusando-se a excluir jogadores negros e operários de seu time, defendendo a inclusão e a igualdade no futebol brasileiro.</p>
            </div>
            <div class="carousel-card">
                <img src="img/mosaico.jpg" alt="Imagem 3">
                <p>Mosaico da Torcida após o clube sofrer discriminação da FEDERAÇÃO com a palavra "Resistiremos"</p>
            </div>
            <div class="carousel-card">
                <img src="img/escudos.jpg" alt="Imagem 4">
                <p>Gerações de escudos do clube</p>
            </div>
            <div class="carousel-card">
                <img src="img/estadio.jpg" alt="Imagem 1">
                <p>Estádio de São Januário"</p>
            </div>
        </div>
    </div>

    <script>
        const carousel = document.getElementById('carousel');
        const slides = document.querySelectorAll('.carousel-card');
        const totalSlides = slides.length;
        const visibleSlides = 3;
        let index = 0;

        for (let i = 0; i < visibleSlides; i++) {
            const clone = slides[i].cloneNode(true);
            carousel.appendChild(clone);
        }

        function showSlide() {
            carousel.style.transform = `translateX(${-index * (100 / visibleSlides)}%)`;
            carousel.style.transition = 'transform 0.5s ease-in-out';

            if (index >= totalSlides) {
                setTimeout(() => {
                    carousel.style.transition = 'none';
                    index = 0;
                    carousel.style.transform = `translateX(0)`;
                }, 500);
            }
        }

        function nextSlide() {
            index++;
            showSlide();
        }

        setInterval(nextSlide, 5000);
    </script>

</body>

</html>

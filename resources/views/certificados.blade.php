<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificados - Clube Vasco da Gama</title>
    <style>
        @font-face {
            font-family: 'SerifaTriangular';
            src: url('/fonts/SerifaTriangular.ttf') format('truetype'); /* Ensure the font file is in the correct location */
        }

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
            justify-content: center; 
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
            text-align: center;
        }

        .certificate-container {
            margin: 50px auto;
            width: 90%; /* Increase width */
            max-width: 1000px; /* Increase max width */
            background-color:rgb(253, 253, 253);
            border: 5px solid black; /* Change border color to black */
            padding: 50px; /* Increase padding */
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .certificate-title {
            font-size: 38px;
            font-weight: bold;
            color: red;
            margin-bottom: 20px;
            font-family: 'Chandiluna';
        }

        .certificate-body {
            font-size: 25px;
            color: #555;
            line-height: 1.6;
        }

        .certificate-footer {
            margin-top: 30px;
            font-size: 16px;
            color: #777;
        }

        .vermelho {
        color: red;
        }
    </style>
</head>
<body>
<header>
        <a href="{{ route('home') }}" style="color: white; text-decoration: none;"> <!-- Add link to home -->
            <h3>Sócio Gigante Club de Regatas Vasco da Gama</h3>
        </a>
        <div class="user-dropdown">
            <span>Olá, {{ explode(' ', Auth::user()->name)[0] }}</span><br>
            <span>{{ Auth::user()->perfil }}</span>
            <span class="arrow" onclick="toggleDropdown()">▼</span>
            <div class="dropdown-content" id="dropdown-content">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </header>

    <div class="certificate-container">
        <div class="certificate-title">✠ Certificado de Torcedor Cruzmaltino ✠</div>
        <div class="certificate-body">
            O(a) torcedor(a) <strong>{{ Auth::user()->name }}</strong>, nascido em <strong>{{ Auth::user()->data_nascimento->format('d/m/Y') }}</strong>, se tornou um torcedor honorário do Club de Regatas Vasco da Gama no dia <strong>{{ Auth::user()->created_at->format('d/m/Y') }}</strong>, o Clube agradece o seu apoio incondicional.
        </div>
        <div class="certificate-footer">
        <img src="{{ asset('img/bandeiras.jpg') }}" alt="Logo Vasco da Gama" style="width: 100px; margin-bottom: 10px;">
            <br>
            <img src="{{ asset('img/escudo-certificado.jpg') }}" alt="Logo Vasco da Gama" style="width: 100px; margin-bottom: 10px;">
            <br>
            <h3 class="vermelho">"NUNCA VÃO ENTENDER ESSE AMOR"</h3>
            <br>
            Clube de Regatas Vasco da Gama - Sócio Gigante
            <br>
            Av. Roberto Dinamite, 10 - Vasco da Gama, Rio de Janeiro - RJ
        </div>
    </div>

    <script>
        setInterval(nextSlide, 3000);

        function toggleDropdown() {
            const dropdownContent = document.getElementById('dropdown-content');
            const arrow = document.querySelector('.user-dropdown .arrow');
            dropdownContent.classList.toggle('active');
            arrow.classList.toggle('active');
        }
    </script>
</body>
</html>

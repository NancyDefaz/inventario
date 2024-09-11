<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tienda de Ropa Infantil</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        body {
            margin: 0;
            font-family: Figtree, ui-sans-serif, system-ui, sans-serif;
            background: linear-gradient(to top, #FFDEE9, #B5FFFC); /* Fondo degradado suave */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .container {
            background: rgba(255, 255, 255, 0.8); /* Fondo blanco semi-transparente */
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            padding: 30px;
            text-align: center;
            width: 80%;
            max-width: 600px;
        }

        h1 {
            font-size: 2.5rem;
            color: #FF8C94; /* Tono vibrante y amigable */
        }

        p {
            font-size: 1.2rem;
            color: #6A5D7B;
        }

        nav {
            margin-top: 20px;
        }

        .auth-button {
            display: inline-block;
            background-color: #FF8C94;
            color: white;
            padding: 12px 25px;
            font-size: 1.1rem;
            border-radius: 50px;
            text-decoration: none;
            transition: all 0.3s ease;
            margin: 10px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .auth-button:hover {
            background-color: #FF5E6C;
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.2);
            transform: translateY(-3px);
        }

        .auth-button:focus {
            outline: none;
            box-shadow: 0 0 0 3px #FFDEE9;
        }

        .background-decorations {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
            background-image: url('https://example.com/clouds-and-rainbows.png'); /* Agrega una imagen de nubes y arcoíris */
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body>
    <div class="background-decorations"></div>
    <div class="container">
        <h1>Bienvenido a la Tienda Infantil</h1>
        <p>Descubre nuestra colección de ropa para bebés y niños.</p>

        @if (Route::has('login'))
            <nav>
                @auth
                    <a href="{{ url('/dashboard') }}" class="auth-button">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="auth-button">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="auth-button">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </div>
</body>
</html>


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Área de Teñido</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        body {
            margin: 0;
            font-family: 'Figtree', sans-serif;
            background: linear-gradient(to bottom right, #f5f7fa, #d9e2ec);
            color: #333;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            padding: 2rem;
            text-align: center;
        }
        h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #ff4757; /* Color similar a un tinte vibrante */
        }
        p {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            color: #555;
        }
        a {
            display: inline-block;
            margin: 0.5rem;
            padding: 0.75rem 1.5rem;
            font-weight: bold;
            color: white;
            background-color: #1e90ff; /* Color de fondo */
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        a:hover {
            background-color: #3498db; /* Color de fondo al pasar el mouse */
        }
        .footer {
            margin-top: 2rem;
            font-size: 0.875rem;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenido al Área de Teñido</h1>
        <p>Explora el arte del teñido y crea obras maestras con colores vibrantes.</p>

        @if (Route::has('login'))
            <div>
                @auth
                    <a href="{{ url('/home') }}">Inicio</a>
                @else
                    <a href="{{ route('login') }}">Iniciar Sesión</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Registrar</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="footer">
            &copy; {{ date('Y') }} Área de Teñido. Todos los derechos reservados.
        </div>
    </div>
</body>
</html>
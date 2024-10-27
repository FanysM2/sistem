@extends('layouts.admin')

@section('contenido')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasos Para Fabricar Tela</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        h1 {
            text-align: center;
            color: #007BFF;
            margin-bottom: 20px;
        }

        @if (Auth::user()->role === 'admin' || Auth::user()->role === 'supervisor')
        a.create-btn {
            display: block;
            width: 200px;
            margin: 0 auto 20px auto;
            padding: 10px;
            text-align: center;
            background-color: #28a745;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        a.create-btn:hover {
            background-color: #218838;
        }
        @endif

        .menu-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .menu-item {
            position: relative;
            margin: 15px;
            padding: 20px;
            width: 300px;
            color: white;
            text-align: center;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            background: rgba(0, 0, 0, 0.5);
            transition: transform 0.3s;
        }

        .menu-item:hover {
            transform: translateY(-5px);
        }

        .menu-item h2,
        .menu-item p {
            position: relative;
            z-index: 1;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            margin: 0;
        }

        .menu-item img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.3;
            z-index: 0;
        }

        .actions {
            margin-top: 10px;
            z-index: 1;
            position: relative;
        }

        .actions a,
        .actions button {
            color: white;
            border: none;
            border-radius: 5px;
            padding: 8px 12px;
            text-decoration: none;
            cursor: pointer;
            margin: 5px;
            transition: background-color 0.3s;
        }

        .actions a {
            background-color: #007BFF;
        }

        .actions a:hover {
            background-color: #0056b3;
        }

        .actions button {
            background-color: #dc3545; /* Color rojo para el botón de eliminar */
        }

        .actions button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <h1>Pasos Para Fabricar Tela</h1>
    
    @if (Auth::user()->role === 'admin' || Auth::user()->role === 'supervisor')
        <a href="{{ route('menus.create') }}" class="create-btn">Crear nuevo Paso</a>
    @endif

    <div class="menu-container">
        @foreach ($menus as $menu)
            <div class="menu-item">
                <img src="{{ asset('storage/' . $menu->imagen) }}" alt="{{ $menu->titulo }}">
                <h2>{{ $menu->titulo }}</h2>
                <p>{{ $menu->descripcion }}</p>
                <div class="actions">
                    @if (Auth::user()->role === 'admin' || Auth::user()->role === 'supervisor')
                        <a href="{{ route('menus.edit', $menu->id) }}">Editar</a>
                        <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este menú?');">Eliminar</button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
@endsection

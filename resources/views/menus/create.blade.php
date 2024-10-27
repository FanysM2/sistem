@extends('layouts.admin')

@section('contenido')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Paso</title>
    <style>
      
        h1 {
            text-align: center;
            color: #080808;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: auto;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            background-color: #007BFF;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #007BFF;
        }
        .volver {
            display: inline-block;
            margin-top: 20px;
            text-align: center;
            color: white;
            background-color: #007BFF;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .volver:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Crear Paso</h1>
    <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" required>
        
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" required></textarea>
        
        <label for="imagen">Imagen de fondo:</label>
        <input type="file" name="imagen">
        
        <button type="submit">Crear Paso</button>
    </form>
    <a href="{{ route('menus.index') }}" class="volver">Volver</a>
</body>
</html>

@endsection

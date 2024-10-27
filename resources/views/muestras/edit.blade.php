@extends('layouts.admin')

@section('contenido')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tipo de Tela</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f9;
        }
        .container {
            margin-top: 20px;
        }
        h1 {
            margin-bottom: 30px;
            text-align: center;
            color: #343a40;
            font-size: 2.5rem;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .btn {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Editar Tipo de Tela</h1>

        <form action="{{ route('muestras.update', $muestra->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" name="titulo" id="titulo" class="form-control" value="{{ $muestra->titulo }}" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" id="descripcion" class="form-control" required>{{ $muestra->descripcion }}</textarea>
            </div>

            <div class="form-group">
                <label for="muestra">Tela:</label>
                <input type="file" name="muestra" id="muestra" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Tipo de Tela</button>
        </form>

        <div class="text-center mt-3">
            <a href="{{ route('muestras.index') }}" class="btn btn-secondary">Regresar</a>
        </div>
    </div>
</body>
</html>

@endsection

@extends('layouts.admin')

@section('contenido')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Tipos de Tela</title>
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
        table {
            background: white;
            border-radius: 0.5rem;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th {
            background-color: #007bff;
            color: white;
        }
        img {
            border-radius: 0.25rem;
        }
        .btn {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Catálogo de Tipos de Tela</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (auth()->user()->role === 'admin')
            <div class="text-right mb-3">
                <a href="{{ route('muestras.create') }}" class="btn btn-primary">Subir Nueva Tela</a>
            </div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Tipo de Tela</th>
                    @if (auth()->user()->role === 'admin')
                        <th>Acciones</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($muestras as $muestra)
                    <tr>
                        <td>{{ $muestra->titulo }}</td>
                        <td>{{ $muestra->descripcion }}</td>
                        <td><img src="{{ asset('storage/' . $muestra->ruta_muestra) }}" width="100"></td>
                        @if (auth()->user()->role === 'admin')
                            <td>
                                <a href="{{ route('muestras.edit', $muestra->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('muestras.destroy', $muestra->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>

@endsection


@extends('layouts.admin')

@section('contenido')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Pregunta</title>
</head>
<body>
    <h1>Agregar Pregunta</h1>
    <form action="{{ route('questions.store') }}" method="POST">
        @csrf
        <input type="text" name="text" placeholder="Escribe la pregunta..." required>
        <button type="submit">Agregar</button>
    </form>
    <a href="{{ route('questions.index') }}">Volver</a>
</body>
</html>
@endsection
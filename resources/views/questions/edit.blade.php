@extends('layouts.admin')

@section('contenido')



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pregunta</title>
</head>
<body>
    <h1>Editar Pregunta</h1>
    <form action="{{ route('questions.update', $question) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="text" value="{{ $question->text }}" required>
        <button type="submit">Actualizar</button>
    </form>
    <a href="{{ route('questions.index') }}">Volver</a>
</body>
</html>
@endsection
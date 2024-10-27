@extends('layouts.admin')

@section('contenido')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preguntas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        h1 {
            color: #343a40;
        }
        .question-item {
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
            padding: 1rem;
            background-color: #ffffff;
            transition: box-shadow 0.3s;
        }
        .question-item:hover {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .badge-info {
            margin-left: 10px;
        }
        .btn-sm {
            margin-left: 5px;
        }
        .answer-item {
            border: 1px solid #28a745;
            border-radius: 0.5rem;
            padding: 0.5rem;
            background-color: #e9fce9;
            margin-top: 0.5rem;
        }
        .answer-user {
            font-weight: bold;
            color: #155724;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Preguntas</h1>
        
        @if(auth()->user()->role === 'admin')  <!-- Control de acceso para Admin -->
            <div class="text-right mb-3">
                <a href="{{ route('questions.create') }}" class="btn btn-primary">Agregar Pregunta</a>
            </div>
        @endif

        <ul class="list-group">
            @foreach ($questions as $index => $question)  <!-- Agregar índice para numerar las preguntas -->
                <li class="list-group-item question-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <strong>Pregunta {{ $index + 1 }}:</strong> {{ $question->text }}
                            <span class="badge badge-info">{{ $question->is_answered ? 'Respondida' : '' }}</span>
                        </div>
                        <div>
                            @if(auth()->user()->role === 'admin')  <!-- Control de acceso para Admin -->
                                <form action="{{ route('questions.destroy', $question) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar esta pregunta?');">Eliminar</button>
                                </form>
                                <a href="{{ route('questions.edit', $question) }}" class="btn btn-warning btn-sm">Editar</a>
                            @endif
                        </div>
                    </div>

                    @if (auth()->user()->role === 'trabajador')  <!-- Solo trabajadores pueden ver el formulario de respuesta -->
                        @if (!$question->is_answered)  <!-- Solo si la pregunta no ha sido respondida -->
                            <form action="{{ route('questions.answer', $question) }}" method="POST" class="mt-2">
                                @csrf
                                <div class="input-group">
                                    <input type="text" name="answer" class="form-control" placeholder="Escribe tu respuesta..." required>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-success">Responder</button>
                                    </div>
                                </div>
                            </form>
                        @endif
                    @endif

                    @if (auth()->user()->role !== 'trabajador')  <!-- Ocultar respuestas a trabajadores -->
                        <ul class="mt-3">
                            @foreach ($question->answers as $answer)
                                <li class="answer-item">
                                    {{ $answer->answer }} 
                                    <div class="answer-user">- Respondido por {{ $answer->user->name }}</div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
@endsection

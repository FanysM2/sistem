{{-- resources/views/users/edit.blade.php --}}
@extends('layouts.admin')

@section('contenido')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <style>
       

        h1 {
            color: #343a40;
            margin-bottom: 20px;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
        }

        form {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px; /* Ancho máximo del formulario */
            margin: auto; /* Centrar formulario */
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input:focus, select:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #343a40;
        }

        .btn-regresar {
            display: inline-block;
            padding: 10px 15px;
            background-color: #6c757d; /* Color gris para el botón de regresar */
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            margin-bottom: 20px; /* Espacio debajo del botón de regresar */
            transition: background-color 0.3s;
        }

        .btn-regresar:hover {
            background-color: #5a6268; /* Color más oscuro al pasar el ratón */
        }
    </style>
</head>
<body>

    <h1>Editar Usuario</h1>
    <a href="{{ route('users.index') }}" class="btn-regresar">Regresar a Usuarios</a>
    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label class="form-label" for="name">Nombre</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}" required>
        </div>
        <div class="form-group">
            <label class="form-label" for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}" required>
        </div>
        <div class="form-group">
            <label class="form-label" for="role">Rol</label>
            <select name="role" id="role" required>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrador</option>
                <option value="supervisor" {{ $user->role == 'supervisor' ? 'selected' : '' }}>Supervisor</option>
                <option value="trabajador" {{ $user->role == 'trabajador' ? 'selected' : '' }}>Trabajador</option>
            </select>
        </div>
        <button type="submit">Actualizar</button>
    </form>

</body>
</html>

@endsection


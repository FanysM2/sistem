@extends('layouts.admin')

@section('contenido')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
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

        /* Estilos adicionales */
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

    <h1>Crear Usuario</h1>
    <a href="{{ route('users.index') }}" class="btn-regresar">Regresar a Usuarios</a>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label class="form-label" for="name">Nombre</label>
            <input type="text" name="name" id="name" placeholder="Nombre" required>
        </div>
        <div class="form-group">
            <label class="form-label" for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Email" required>
        </div>
        <div class="form-group">
            <label class="form-label" for="password">Contraseña</label>
            <input type="password" name="password" id="password" placeholder="Contraseña" required>
        </div>
        <div class="form-group">
            <label class="form-label" for="role">Rol</label>
            <select name="role" id="role" required>
                <option value="admin">Administrador</option>
                <option value="supervisor">Supervisor</option>
                <option value="trabajador">Trabajador</option>
            </select>
        </div>
        <button type="submit">Crear</button>
    </form>

    
       
  

</body>
</html>


@endsection

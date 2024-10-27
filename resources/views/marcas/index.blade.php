@extends('layouts.admin')

@section('contenido')

<style>
  
    .container {
        margin-top: 20px;
        padding: 30px; /* Aumentar padding para un aspecto más espacioso */
        background-color: #ffffff; /* Fondo blanco para el contenedor */
        border-radius: 8px; /* Bordes redondeados */
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Sombra más profunda */
    }
    h1 {
        text-align: center;
        margin-bottom: 20px;
        color: #0a0101; /* Color del título */
        font-weight: bold; /* Negrita para el título */
        font-size: 2.5em; /* Tamaño de fuente mayor */
        
    }
   
    .form-group {
        margin-bottom: 20px; /* Espacio entre los campos */
    }
    .btn-primary {
        width: 100%; /* Botón ocupa todo el ancho */
        padding: 10px; /* Aumentar el padding del botón */
        font-size: 1.1em; /* Tamaño de fuente más grande */
    }
    .brand-card {
        border: 1px solid #dee2e6; /* Borde de las tarjetas */
        border-radius: 5px; /* Bordes redondeados */
        padding: 15px;
        text-align: center; /* Centrar texto en la tarjeta */
        margin-bottom: 20px; /* Espacio entre tarjetas */
        transition: transform 0.2s; /* Efecto de transición */
        background-color: #ffffff; /* Fondo blanco para la tarjeta */
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Sombra para las tarjetas */
    }
    .brand-card:hover {
        transform: translateY(-5px); /* Efecto de levantamiento al pasar el mouse */
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15); /* Sombra más pronunciada al hover */
    }
    .brand-card h5 {
        background: linear-gradient(90deg, #007bff, #00c6ff); /* Fondo degradado para el título de la tarjeta */
        color: white; /* Color de texto blanco */
        padding: 10px; /* Espaciado interno */
        border-radius: 5px; /* Bordes redondeados */
    }
    .brand-card img {
        border-radius: 5px; /* Bordes redondeados para las imágenes */
        width: 100px; /* Ajustar el ancho de las imágenes */
        height: auto; /* Mantener proporción de la imagen */
        margin-top: 10px; /* Espacio superior para la imagen */
    }
    .btn-danger {
        margin-top: 5px; /* Espacio superior para el botón de eliminar */
    }
    .alert {
        margin-bottom: 20px; /* Espacio inferior para alertas */
    }
</style>

<div class="container">
    <h1>Marcas</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($esAdmin) <!-- Solo muestra el formulario si el usuario es admin -->
        <form action="{{ route('marcas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" name="titulo" id="titulo" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="imagen">Imagen:</label>
                <input type="file" name="imagen" id="imagen" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Agregar Marca</button>
        </form>
    @endif


    <div class="row">
        @foreach ($marcas as $marca)
            <div class="col-md-4">
                <div class="brand-card">
                    <h5>{{ $marca->titulo }}</h5>
                    <img src="{{ asset('storage/' . $marca->ruta_imagen) }}" alt="{{ $marca->titulo }}">
                    @if ($esAdmin) <!-- Solo muestra el botón de eliminar si el usuario es admin -->
                        <form action="{{ route('marcas.destroy', $marca->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection

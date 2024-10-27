@extends('layouts.admin')

@section('contenido')
<div class="container">
    <h1>Agregar Máquina</h1>

    <form action="{{ route('aparatos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>
        <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="file" class="form-control" id="imagen" name="imagen" required>
        </div>
        <div class="form-group">
            <label for="caracteristicas">Características</label>
            <textarea class="form-control" id="caracteristicas" name="caracteristicas"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
        <a href="{{ route('aparatos.index') }}" class="btn btn-secondary">Volver</a>

    </form>
</div>
@endsection

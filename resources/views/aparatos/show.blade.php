@extends('layouts.admin')

@section('contenido')
<div class="container">
    <h1>{{ $aparato->titulo }}</h1>
    <img src="{{ asset('storage/' . $aparato->ruta_imagen) }}" class="img-fluid" alt="{{ $aparato->titulo }}">
    <h3>Características</h3>
    <p>{{ $aparato->caracteristicas }}</p>
    <a href="{{ route('aparatos.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection

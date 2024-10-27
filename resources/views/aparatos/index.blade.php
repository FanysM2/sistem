@extends('layouts.admin')

@section('contenido')
<div class="container">
    <h1>Catálogo de Máquinas</h1>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Verificamos si el usuario es administrador o supervisor --}}
    @if (auth()->user()->role === 'admin' || auth()->user()->role === 'supervisor')
        <a href="{{ route('aparatos.create') }}" class="btn btn-primary">Agregar Máquina</a>
    @endif

    <div class="row mt-4">
        @foreach ($aparatos as $aparato)
            <div class="col-md-4">
                <div class="card mb-4">
                    <a href="{{ route('aparatos.show', $aparato) }}">
                        <img src="{{ asset('storage/' . $aparato->ruta_imagen) }}" class="card-img-top" alt="{{ $aparato->titulo }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $aparato->titulo }}</h5>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

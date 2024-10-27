<?php

namespace App\Http\Controllers;

use App\Models\Aparato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AparatoController extends Controller
{
    public function index()
    {
        $aparatos = Aparato::all();
        return view('aparatos.index', compact('aparatos'));
    }

    public function create()
    {
        return view('aparatos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'caracteristicas' => 'nullable|string',
        ]);

        $rutaImagen = $request->file('imagen')->store('images', 'public');

        Aparato::create([
            'titulo' => $request->titulo,
            'ruta_imagen' => $rutaImagen,
            'caracteristicas' => $request->caracteristicas,
        ]);

        return redirect()->route('aparatos.index')->with('success', 'Máquina agregada exitosamente');
    }

    public function show(Aparato $aparato)
    {
        return view('aparatos.show', compact('aparato'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MarcaController extends Controller
{
    public function index()
    {
        $marcas = Marca::all();
        $esAdmin = auth()->user()->role === 'admin'; // Verificar si el usuario es admin
        return view('marcas.index', compact('marcas', 'esAdmin'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $rutaImagen = $request->file('imagen')->store('marcas', 'public');

        Marca::create([
            'titulo' => $request->titulo,
            'ruta_imagen' => $rutaImagen,
        ]);

        return redirect()->route('marcas.index')->with('success', 'Marca agregada con éxito.');
    }

    public function destroy(Marca $marca)
    {
        $this->authorize('delete', $marca); // Asegúrate de que el usuario tenga permiso para eliminar
        $marca->delete();
        return redirect()->route('marcas.index')->with('success', 'Marca eliminada con éxito.');
    }
}
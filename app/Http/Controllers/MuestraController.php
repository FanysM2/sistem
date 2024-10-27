<?php

namespace App\Http\Controllers;

use App\Models\Muestra;
use Illuminate\Http\Request;

class MuestraController extends Controller
{
    public function index()
    {
        $muestras = Muestra::all();
        return view('muestras.index', compact('muestras'));
    }

    public function create()
    {
        return view('muestras.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'muestra' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $ruta_muestra = $request->file('muestra')->store('muestras', 'public');

        Muestra::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'ruta_muestra' => $ruta_muestra,
        ]);

        return redirect()->route('muestras.index')->with('success', 'Muestra subida con éxito.');
    }

    public function edit($id)
    {
        $muestra = Muestra::findOrFail($id);
        return view('muestras.edit', compact('muestra'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'muestra' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $muestra = Muestra::findOrFail($id);
        $muestra->titulo = $request->titulo;
        $muestra->descripcion = $request->descripcion;

        if ($request->hasFile('muestra')) {
            $ruta_muestra = $request->file('muestra')->store('muestras', 'public');
            $muestra->ruta_muestra = $ruta_muestra;
        }

        $muestra->save();
        return redirect()->route('muestras.index')->with('success', 'Muestra actualizada con éxito.');
    }

    public function destroy($id)
    {
        $muestra = Muestra::findOrFail($id);
        $muestra->delete();
        return redirect()->route('muestras.index')->with('success', 'Muestra eliminada con éxito.');
    }
}

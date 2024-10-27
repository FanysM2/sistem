<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('menus.index', compact('menus'));
    }

    public function create()
    {
        return view('menus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $menu = new Menu();
        $menu->titulo = $request->titulo;
        $menu->descripcion = $request->descripcion;

        try {
            if ($request->hasFile('imagen')) {
                $path = $request->file('imagen')->store('images', 'public');
                $menu->imagen = $path;
            }

            $menu->save();
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }

        return redirect()->route('menus.index');
    }

    public function edit(Menu $menu)
    {
        return view('menus.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $menu->titulo = $request->titulo;
        $menu->descripcion = $request->descripcion;

        try {
            if ($request->hasFile('imagen')) {
                if ($menu->imagen) {
                    Storage::disk('public')->delete($menu->imagen);
                }
                $path = $request->file('imagen')->store('images', 'public');
                $menu->imagen = $path;
            }

            $menu->save();
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }

        return redirect()->route('menus.index');
    }

    public function destroy(Menu $menu)
    {
        if ($menu->imagen) {
            Storage::disk('public')->delete($menu->imagen);
        }
        $menu->delete();

        return redirect()->route('menus.index');
    }
}

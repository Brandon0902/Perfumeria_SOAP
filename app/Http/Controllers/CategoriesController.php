<?php

namespace App\Http\Controllers;

use App\Models\Categories; 
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        return view('administrador.categorias.index', compact('categories'));
    }

    public function create()
    {
        return view('administrador.categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'categoryName' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $categoria = new Categories([
            'categoryName' => $request->input('categoryName'),
            'description' => $request->input('description'),
        ]);

        $categoria->save();

        return redirect()->route('categories.index')->with('success', 'Categoria creada exitosamente');
    }

    public function show(Categories $categoria)
    {
        return view('categories.show', compact('categoria'));
    }

    public function edit(Categories $categoria)
    {
        return view('administrador.categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categories $categoria)
    {
        $request->validate([
            'categoryName' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $categoria->update([
            'categoryName' => $request->input('categoryName'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('categories.index')->with('success', 'Categoria actualizada exitosamente');
    }

    public function destroy(Categories $categoria)
    {
        $categoria->delete();

        return redirect()->route('categories.index')->with('success', 'Categoria eliminada exitosamente');
    }
}

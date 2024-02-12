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
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validación de la imagen
        ]);

        $categoria = new Categories([
            'categoryName' => $request->input('categoryName'),
            'description' => $request->input('description'),
        ]);

        // Guardar la imagen si se proporciona
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $categoria->image = $imageName;
        }

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
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validación de la imagen
        ]);

        $categoria->update([
            'categoryName' => $request->input('categoryName'),
            'description' => $request->input('description'),
        ]);

        // Actualizar la imagen si se proporciona
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            // Eliminar la imagen anterior si existe
            if ($categoria->image) {
                unlink(public_path('images/' . $categoria->image));
            }

            $categoria->image = $imageName;
            $categoria->save();
        }

        return redirect()->route('categories.index')->with('success', 'Categoria actualizada exitosamente');
    }

    public function destroy(Categories $categoria)
    {
        // Eliminar la imagen asociada antes de eliminar la categoría
        if ($categoria->image) {
            unlink(public_path('images/' . $categoria->image));
        }

        $categoria->delete();

        return redirect()->route('categories.index')->with('success', 'Categoria eliminada exitosamente');
    }
}

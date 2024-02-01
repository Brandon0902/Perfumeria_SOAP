<?php

namespace App\Http\Controllers;

use App\Models\Categories; 
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'categoryname' => 'required|string|max:255',
            'descption' => 'required|string',
        ]);

        $categoria = new Categories([
            'id' => $request->input('id'),
            'categoryname' => $request->input('categoryname'),
            'descption' => $request->input('descption'),
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
        return view('categories.edit', compact('categoria'));
    }

    public function update(Request $request, Categories $categoria)
    {
        $request->validate([
            'id' => 'required|integer',
            'categoryname' => 'required|string|max:255',
            'descption' => 'required|string',
        ]);

        $categoria->update([
            'id' => $request->input('id'),
            'categoryname' => $request->input('categoryname'),
            'descption' => $request->input('descption'),
        ]);

        return redirect()->route('categories.index')->with('success', 'Categoria actualizada exitosamente');
    }

    public function destroy(Categories $categoria)
    {
        $categoria->delete();

        return redirect()->route('categories.index')->with('success', 'Categoria eliminada exitosamente');
    }
}

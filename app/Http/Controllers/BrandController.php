<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('brands.index', compact('brands'));
    }

    public function create()
    {
        return view('brands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $marca = new Brand([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        $marca->save();

        return redirect()->route('brands.index')->with('success', 'Marca creada exitosamente');
    }

    public function show(Brand $marca)
    {
        return view('brands.show', compact('marca'));
    }

    public function edit(Brand $marca)
    {
        return view('brands.edit', compact('marca'));
    }

    public function update(Request $request, Brand $marca)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $marca->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('brands.index')->with('success', 'Marca actualizada exitosamente');
    }

    public function destroy(Brand $marca)
    {
        $marca->delete();

        return redirect()->route('brands.index')->with('success', 'Marca eliminada exitosamente');
    }
}

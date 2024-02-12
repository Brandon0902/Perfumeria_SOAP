<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('administrador.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('administrador.brands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
    
        $brand = new Brand([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);
    
        // Procesamiento de la imagen
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $brand->image = $imageName;
        }
    
        $brand->save();
    
        return redirect()->route('brands.index')->with('success', 'Marca creada exitosamente');
    }

    public function show(Brand $brand)
    {
        return view('brands.show', compact('brand'));
    }

    public function edit(Brand $brand)
    {
        return view('administrador.brands.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validación de la imagen
        ]);

        $brand->name = $request->input('name');
        $brand->description = $request->input('description');

        // Almacena el nuevo archivo de imagen
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $brand->image = $imageName;
        }

        $brand->save();

        return redirect()->route('brands.index')->with('success', 'Marca actualizada exitosamente');
    }

    public function destroy(Brand $brand)
    {
        if ($brand->image) {
            unlink(public_path('images/' . $brand->image));
        }

        $brand->delete();

        return redirect()->route('brands.index')->with('success', 'Marca eliminada exitosamente');
    }
}

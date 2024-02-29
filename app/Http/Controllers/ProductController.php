<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Products::all();
        return view('administrador.products.index', compact('products'));
    }

    public function create()
    {
        return view('administrador.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'supplierId' => 'required|integer',
            'categoryId' => 'required|integer',
            'description' => 'required',
            'quantityPerUnit' => 'required|string',
            'price' => 'required|numeric',
            'unitsInStock' => 'required|integer',
            'unitsOnOrder' => 'required|integer',
            'reorderLevel' => 'required|integer',
            'discontinued' => 'required|string', // No cambia esta validación
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validación de la imagen
        ]);

        $producto = new Products([
            'name' => $request->input('name'),
            'supplierId' => $request->input('supplierId'),
            'categoryId' => $request->input('categoryId'),
            'description' => $request->input('description'),
            'quantityPerUnit' => $request->input('quantityPerUnit'),
            'price' => $request->input('price'),
            'unitsInStock' => $request->input('unitsInStock'),
            'unitsOnOrder' => $request->input('unitsOnOrder'),
            'reorderLevel' => $request->input('reorderLevel'),
            'discontinued' => $request->input('discontinued'),
        ]);

        // Guardar la imagen si se proporciona
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $producto->image = $imageName;
        }

        $producto->save();

        return redirect()->route('products.index')->with('success', 'Producto creado exitosamente');
    }


    public function show(Products $producto)
    {
        return view('administrador.products.show', compact('producto'));
    }

    public function edit(Products $producto)
    {
        return view('administrador.products.edit', compact('producto'));
    }

    public function update(Request $request, Products $producto)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'supplierId' => 'required|integer',
            'categoryId' => 'required|integer',
            'description' => 'required',
            'quantityPerUnit' => 'required|string',
            'price' => 'required|numeric',
            'unitsInStock' => 'required|integer',
            'unitsOnOrder' => 'required|integer',
            'reorderLevel' => 'required|integer',
            'discontinued' => 'required|string', // No cambia esta validación
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validación de la imagen
        ]);

        $producto->update([
            'name' => $request->input('name'),
            'supplierId' => $request->input('supplierId'),
            'categoryId' => $request->input('categoryId'),
            'description' => $request->input('description'),
            'quantityPerUnit' => $request->input('quantityPerUnit'),
            'price' => $request->input('price'),
            'unitsInStock' => $request->input('unitsInStock'),
            'unitsOnOrder' => $request->input('unitsOnOrder'),
            'reorderLevel' => $request->input('reorderLevel'),
            'discontinued' => $request->input('discontinued'),
        ]);

        // Actualizar la imagen si se proporciona
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            // Eliminar la imagen anterior si existe
            if ($producto->image) {
                unlink(public_path('images/' . $producto->image));
            }

            $producto->image = $imageName;
            $producto->save();
        }

        return redirect()->route('products.index')->with('success', 'Producto actualizado exitosamente');
    }

    public function destroy(Products $producto)
    {
        // Eliminar la imagen asociada antes de eliminar el producto
        if ($producto->image) {
            unlink(public_path('images/' . $producto->image));
        }

        $producto->delete();

        return redirect()->route('products.index')->with('success', 'Producto eliminado exitosamente');
    }

    public function productList(){
        $products=Product::all();

        return view('products', compact('products'));
    }
}

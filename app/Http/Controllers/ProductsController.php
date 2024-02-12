<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
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
            'productName' => 'required|string|max:255',
            'supplierId' => 'required|integer',
            'categoryId' => 'required|integer',
            'quantityPerUnit' => 'required|string',
            'unitPrice' => 'required|numeric',
            'unitsInStock' => 'required|integer',
            'unitsOnOrder' => 'required|integer',
            'reorderLevel' => 'required|integer',
            'discontinued' => 'required|boolean',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validación de la imagen
        ]);

        var_dump('Aqui es despues de la validacion');

        $producto = new Products([
            'productName' => $request->input('productName'),
            'supplierId' => $request->input('supplierId'),
            'categoryId' => $request->input('categoryId'),
            'quantityPerUnit' => $request->input('quantityPerUnit'),
            'unitPrice' => $request->input('unitPrice'),
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
            'productName' => 'required|string|max:255',
            'supplierId' => 'required|integer',
            'categoryId' => 'required|integer',
            'quantityPerUnit' => 'required|string',
            'unitPrice' => 'required|numeric',
            'unitsInStock' => 'required|integer',
            'unitsOnOrder' => 'required|integer',
            'reorderLevel' => 'required|integer',
            'discontinued' => 'required|boolean',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validación de la imagen
        ]);

        $producto->update([
            'productName' => $request->input('productName'),
            'supplierId' => $request->input('supplierId'),
            'categoryId' => $request->input('categoryId'),
            'quantityPerUnit' => $request->input('quantityPerUnit'),
            'unitPrice' => $request->input('unitPrice'),
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
}

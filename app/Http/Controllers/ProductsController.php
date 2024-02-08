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
            'reoderLevel' => 'required|integer',
            'discontinued' => 'required|boolean',
        ]);

        $producto = new Products([
            'productName' => $request->input('productName'),
            'supplierId' => $request->input('supplierId'),
            'categoryId' => $request->input('categoryId'),
            'quantityPerUnit' => $request->input('quantityPerUnit'),
            'unitPrice' => $request->input('unitPrice'),
            'unitsInStock' => $request->input('unitsInStock'),
            'unitsOnOrder' => $request->input('unitsOnOrder'),
            'reoderLevel' => $request->input('reoderLevel'),
            'discontinued' => $request->input('discontinued'),
        ]);

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
            'reoderLevel' => 'required|integer',
            'discontinued' => 'required|boolean',
        ]);

        $producto->update([
            'productName' => $request->input('productName'),
            'supplierId' => $request->input('supplierId'),
            'categoryId' => $request->input('categoryId'),
            'quantityPerUnit' => $request->input('quantityPerUnit'),
            'unitPrice' => $request->input('unitPrice'),
            'unitsInStock' => $request->input('unitsInStock'),
            'unitsOnOrder' => $request->input('unitsOnOrder'),
            'reoderLevel' => $request->input('reoderLevel'),
            'discontinued' => $request->input('discontinued'),
        ]);

        return redirect()->route('products.index')->with('success', 'Producto actualizado exitosamente');
    }

    public function destroy(Products $producto)
    {
        $producto->delete();

        return redirect()->route('products.index')->with('success', 'Producto eliminado exitosamente');
    }
}

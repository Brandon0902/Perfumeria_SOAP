<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
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
            'image2' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validación de la imagen
            'image3' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validación de la imagen
        ]);

        $producto = new Product([
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
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $producto->image = $imageName;
        }

        // Guardar la imagen si se proporciona
        if ($request->hasFile('image2')) {
            $image2 = $request->file('image2');
            $imageName2 = uniqid() . '.' . $image2->getClientOriginalExtension();
            $image2->move(public_path('images'), $imageName2);
            $producto->image2 = $imageName2;
        }

        // Guardar la imagen si se proporciona
        if ($request->hasFile('image3')) {
            $image3 = $request->file('image3');
            $imageName3 = uniqid() . '.' . $image3->getClientOriginalExtension();
            $image3->move(public_path('images'), $imageName3);
            $producto->image3 = $imageName3;
        }

        $producto->save();

        return redirect()->route('products.index')->with('success', 'Producto creado exitosamente');
    }


    public function show(Product $producto)
    {
        return view('administrador.products.show', compact('producto'));
    }

    public function edit(Product $producto)
    {
        return view('administrador.products.edit', compact('producto'));
    }

    public function update(Request $request, Product $producto)
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

    public function destroy(Product $producto)
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
    
    public function getProductDetails(Product $product)
    {
        // Obtener los detalles del producto, incluyendo el nombre, precio, descripción, proveedor y región
        $productDetails = [
            'name' => $product->name,
            'price' => $product->price,
            'description' => $product->description,
            'supplier' => $product->supplier->companyName,
            'region' => $product->supplier->region, 
            'category' => $product->category->categoryName,
            'image' => $product->image,
        ];

        // Devolver los detalles del producto a la vista
        return view('detalles_producto', compact('productDetails'));
    }
}

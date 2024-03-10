<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {

    
    public function productList(){
        $products=Product::all();

        return view('products', compact('products'));
    }
    
    public function getProductDetails(Product $product)
{
    // Obtener los detalles del producto, incluyendo el nombre, precio, descripción, proveedor y región
    $productDetails = (object)[
        'name' => $product->name,
        'price' => $product->price,
        'description' => $product->description,
        'supplier' => $product->supplier->companyName,
        'region' => $product->supplier->region, 
        'category' => $product->category->categoryName,
        'image' => $product->image,
        'image2' => $product->image2,
        'image3' => $product->image3,
    ];

    // Devolver los detalles del producto a la vista
    return view('detalles_producto', compact('productDetails'));
}
}
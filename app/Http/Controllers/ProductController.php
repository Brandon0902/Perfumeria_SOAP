<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller {


    public function productList()
{
    try {
        $token = $this->getToken();
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '. $token,
        ])->get('http://127.0.0.1:8000/api/productsList');

        if ($response->successful()) {
            $products = $response->json()['products'];
            // En lugar de retornar una vista, retornamos los productos directamente
            //dd($products);
            return view('products')->with('products', $products);
        } else {
            // En caso de error, simplemente retornamos un mensaje de error
            return response()->json(['error' => 'Error al obtener los productos de la API'], $response->status());
        }
    } catch (\Exception $e) {
        // Manejo de excepciones en caso de error de conexión
        return response()->json(['error' => 'Error de conexión con la API'], 500);
    }
}
    public function getProductDetails($productId)
    {
        try {
            // Hacer una nueva solicitud HTTP para obtener los detalles del producto específico
            $response = Http::get('http://127.0.0.1:8000/api/productDetail/' . $productId);

            if ($response->successful()) {
                // Obtener los detalles del producto del cuerpo de la respuesta JSON
                $productDetails = $response->json()['product'];

                // Cargar las relaciones del producto (supplier y category)
                $product = Product::with('supplier', 'category')->find($productId);
                
                // Reemplazar los IDs con los datos relacionados
                $productDetails['supplier'] = $product->supplier->companyName;
                $productDetails['region'] = $product->supplier->region;
                $productDetails['category'] = $product->category->categoryName;

                // Retornar los detalles del producto a la vista
                return view('detalles_producto', compact('productDetails'));
            } else {
                // En caso de error, simplemente retornamos un mensaje de error
                return response()->json(['error' => 'Error al obtener los detalles del producto de la API'], $response->status());
            }
        } catch (\Exception $e) {
            // Manejo de excepciones en caso de error de conexión
            return response()->json(['error' => 'Error de conexión con la API'], 500);
        }
    }

    private function getToken() {
        $token = session('auth_token');
        if ($token) {
            return $token;
        } else {
            return 'Error: Token de autenticación no encontrado en la sesión';
        }
    }
}
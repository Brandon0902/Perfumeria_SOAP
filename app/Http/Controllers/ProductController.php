<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

class ProductController extends Controller
{
    protected $apiBaseUrl;

    public function __construct()
    {
        $this->apiBaseUrl = 'http://127.0.0.1:8000/api';
    }

    public function index()
    {
        try {
            $token = $this->getToken();
            $response = Http::withHeaders([
                'Authorization' => 'Bearer '. $token,
            ])->get($this->apiBaseUrl.'/products');
            $statusCode = $response->status();

            if ($statusCode === 200) {
                // Accede directamente a los productos sin anidarlos dentro de otro arreglo
                $products = $response->json()['products'];
                //dd($products);
                return view('administrador.products.index', compact('products'));
            } else {
                return response()->json(['error' => 'Error al obtener los productos de la API'], $statusCode);
            }
        } catch (RequestException $e) {
            return response()->json(['error' => 'Error de conexión con la API'], 500);
        }
    }

    public function create()
    {
        return view('administrador.products.create');
    }

    public function store(Request $request)
    {
        try {
            $token = $this->getToken();
            $http = Http::withHeaders([
                'Authorization' => 'Bearer '. $token
            ]);

            // Adjuntar la imagen principal
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $http->attach(
                    'image', file_get_contents($image), $image->getClientOriginalName()
                );
            }

            // Adjuntar la imagen 2
            if ($request->hasFile('image2')) {
                $image2 = $request->file('image2');
                $http->attach(
                    'image2', file_get_contents($image2), $image2->getClientOriginalName()
                );
            }

            // Adjuntar la imagen 3
            if ($request->hasFile('image3')) {
                $image3 = $request->file('image3');
                $http->attach(
                    'image3', file_get_contents($image3), $image3->getClientOriginalName()
                );
            }

            $response = $http->post($this->apiBaseUrl.'/products', $request->except('_token'));

            if ($response->successful()) {
                return redirect()->route('products.index')->with('success', 'Producto creado exitosamente');
            } else {
                return back()->withInput()->withErrors(['error' => 'Error al crear el producto: ' . $response->body()]);
            }
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Se produjo un error al procesar la solicitud: ' . $e->getMessage()]);
        }
    }

    public function show($id)
    {
        try {
            $token = $this->getToken();
            $response = Http::withHeaders([
                'Authorization' => 'Bearer '. $token,
            ])->get($this->apiBaseUrl.'/products/'.$id);
            $product = json_decode($response->body(), true);
            return view('administrador.products.show', compact('product'));
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Se produjo un error al procesar la solicitud: ' . $e->getMessage()]);
        }
    }

    
    public function edit($id)
    {
        try {
            $token = $this->getToken();
            $response = Http::withHeaders([
                'Authorization' => 'Bearer '. $token,
            ])->get($this->apiBaseUrl.'/products/'.$id);
            
            $product = json_decode($response->body(), true);
            
            // Verificar si se obtuvo correctamente el producto
            if(isset($product['product'])) {
                // Acceder directamente al arreglo 'product'
                $product = $product['product'];
                //dd($product);

                // Pasar el arreglo a la vista
                return view('administrador.products.edit', compact('product'));
            } else {
                // Manejar el caso donde no se encuentra el producto
                return back()->withInput()->withErrors(['error' => 'No se encontró el producto']);
            }
        } catch (\Exception $e) {
            // Manejar cualquier excepción ocurrida durante la solicitud
            return back()->withInput()->withErrors(['error' => 'Se produjo un error al procesar la solicitud: ' . $e->getMessage()]);
        }
    }


    public function update(Request $request, $id)
    {
        try {
            $token = $this->getToken();
            $http = Http::withHeaders([
                'Authorization' => 'Bearer '. $token,
            ]);

            // Adjuntar la imagen principal
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $http->attach(
                    'image', file_get_contents($image), $image->getClientOriginalName()
                );
            }

            // Adjuntar la imagen 2
            if ($request->hasFile('image2')) {
                $image2 = $request->file('image2');
                $http->attach(
                    'image2', file_get_contents($image2), $image2->getClientOriginalName()
                );
            }

            // Adjuntar la imagen 3
            if ($request->hasFile('image3')) {
                $image3 = $request->file('image3');
                $http->attach(
                    'image3', file_get_contents($image3), $image3->getClientOriginalName()
                );
            }

            // Imprimir los datos que se están enviando
            //dd($http, $request->except('_token'));

            $response = $http->post($this->apiBaseUrl.'/products/'.$id, $request->except('_token'));

            if ($response->successful()) {
                return redirect()->route('products.index')->with('success', 'Producto actualizado exitosamente');
            } else {
                return back()->withInput()->withErrors(['error' => 'Error al actualizar el producto: ' . $response->body()]);
            }
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Se produjo un error al procesar la solicitud: ' . $e->getMessage()]);
        }
    }


    public function destroy($id)
    {
        try {
            $token = $this->getToken();
            $response = Http::withHeaders([
                'Authorization' => 'Bearer '. $token,
            ])->delete($this->apiBaseUrl.'/products/'.$id);
            return redirect()->route('products.index')->with('success', 'Producto eliminado exitosamente');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Se produjo un error al procesar la solicitud: ' . $e->getMessage()]);
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

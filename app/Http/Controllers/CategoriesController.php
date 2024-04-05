<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Client\RequestException;

class CategoriesController extends Controller
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
            ])->get($this->apiBaseUrl.'/categories');

            $statusCode = $response->status();

            if ($statusCode === 200) {
                $categories = $response->json();
                //dd($categories);
                return view('administrador.categorias.index', compact('categories'));
            } else {
                return response()->json(['error' => 'Error al obtener las categorías de la API'], $statusCode);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error de conexión con la API'], 500);
        }
    }

    public function create()
    {
        return view('administrador.categorias.create');
    }

    public function store(Request $request)
    {
        try {
            $token = $this->getToken();
            $http = Http::withHeaders([
                'Authorization' => 'Bearer '. $token
            ]);
            
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $http->attach('image', file_get_contents($image->getRealPath()), $image->getClientOriginalName());
            }
            
            $response = $http->post($this->apiBaseUrl.'/categories', $request->except('_token', 'image'));

            if ($response->successful()) {
                return redirect()->route('categories.index')->with('success', 'Categoría creada exitosamente');
            } else {
                return back()->withInput()->withErrors(['error' => 'Error al crear la categoría: ' . $response->body()]);
            }
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Se produjo un error al procesar la solicitud: ' . $e->getMessage()]);
        }
    }

    public function show($id)
    {    
        $token = $this->getToken();
        $response = Http::withHeaders([
                'Authorization' => 'Bearer '. $token
        ])->get($this->apiBaseUrl.'/categories/'.$id);
        $category = json_decode($response->body(), true);
        return view('administrador.categorias.show', compact('category'));
    }

    public function edit($id)
    {
        $token = $this->getToken();
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '. $token
        ])->get($this->apiBaseUrl.'/categories/'.$id);
        
        $category = json_decode($response->body(), true);
        //dd($category);
        return view('administrador.categorias.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        try {
            $token = $this->getToken();

            $http = Http::withHeaders([
                'Authorization' => 'Bearer '. $token
            ]);
            
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $http->attach('image', file_get_contents($image->getRealPath()), $image->getClientOriginalName());
            }
            
            $response = $http->post($this->apiBaseUrl.'/categories/'.$id, $request->except('_token'));

            if ($response->successful()) {
                return redirect()->route('categories.index')->with('success', 'Categoría actualizada exitosamente');
            } else {
                return back()->withInput()->withErrors(['error' => 'Error al actualizar la categoría: ' . $response->body()]);
            }
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Se produjo un error al procesar la solicitud: ' . $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $token = $this->getToken();
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '. $token
        ])->delete($this->apiBaseUrl.'/categories/'.$id);
        return redirect()->route('categories.index')->with('success', 'Categoría eliminada exitosamente');
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

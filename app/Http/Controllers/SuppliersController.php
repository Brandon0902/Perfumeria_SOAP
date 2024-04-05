<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

class SuppliersController extends Controller
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
            ])->get($this->apiBaseUrl.'/suppliers');
            $statusCode = $response->status();

            if ($statusCode === 200) {
                $suppliers = $response->json();
                //dd($suppliers);
                return view('administrador.suppliers.index', compact('suppliers'));
            } else {
                return response()->json(['error' => 'Error al obtener los proveedores de la API'], $statusCode);
            }
        } catch (RequestException $e) {
            return response()->json(['error' => 'Error de conexión con la API'], 500);
        }
    }

    public function create()
    {
        return view('administrador.suppliers.create');
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
                $http->attach(
                    'image', file_get_contents($image), $image->getClientOriginalName()
                );
            }

            $response = $http->post($this->apiBaseUrl.'/suppliers', $request->except('_token'));

            if ($response->successful()) {
                return redirect()->route('suppliers.index')->with('success', 'Proveedor creado exitosamente');
            } else {
                return back()->withInput()->withErrors(['error' => 'Error al crear el proveedor: ' . $response->body()]);
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
            ])->get($this->apiBaseUrl.'/suppliers/'.$id);
            $supplier = json_decode($response->body(), true);
            return view('administrador.suppliers.show', compact('supplier'));
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
            ])->get($this->apiBaseUrl.'/suppliers/'.$id);
            $supplier = json_decode($response->body(), true)['supplier']; // Accede directamente al array 'supplier'
            //dd($supplier);
            return view('administrador.suppliers.edit', compact('supplier'));
        } catch (\Exception $e) {
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

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $http->attach(
                    'image', file_get_contents($image), $image->getClientOriginalName()
                );
            }

            $response = $http->post($this->apiBaseUrl.'/suppliers/'.$id, $request->except('_token'));

            if ($response->successful()) {
                return redirect()->route('suppliers.index')->with('success', 'Proveedor actualizado exitosamente');
            } else {
                return back()->withInput()->withErrors(['error' => 'Error al actualizar el proveedor: ' . $response->body()]);
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
            ])->delete($this->apiBaseUrl.'/suppliers/'.$id);
            return redirect()->route('suppliers.index')->with('success', 'Proveedor eliminado exitosamente');
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

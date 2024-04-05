<?php

namespace App\Http\Controllers;

use App\Models\Shippers; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class ShippersController extends Controller
{

    protected $apiBaseUrl;

    public function __construct()
    {
        // URL base de tu API externa
        $this->apiBaseUrl = 'http://127.0.0.1:8000/api';
    }

    public function index()
    {
        try {
            $token = $this->getToken();
            $response = Http::withHeaders([
                'Authorization' => 'Bearer '. $token,
 
            ])->get($this->apiBaseUrl.'/shippers');
            $statusCode = $response->status();

            if ($statusCode === 200) {
                $shippers = $response->json();
                //dd($shippers);
                return view('administrador.shippers.index', compact('shippers'));
            } else {
                return response()->json(['error' => 'Error al obtener los transportistas de la API'], $statusCode);
            }
        } catch (RequestException $e) {
            return response()->json(['error' => 'Error de conexión con la API'], 500);
        }
    }


    public function create()
    {
        return view('administrador.shippers.create');
    }

    public function store(Request $request)
{
    try {
        // Realiza la solicitud HTTP para crear el transportista
        $token = $this->getToken();
        
        $http = Http::withHeaders([
            'Authorization' => 'Bearer '. $token
        ]);
        
        // Verifica si el archivo de imagen existe
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // Adjunta la imagen a la solicitud si existe
            $http->attach(
                'image', file_get_contents($image), $image->getClientOriginalName()
            );
        }
        
        $response = $http->post($this->apiBaseUrl.'/shippers', $request->except('_token'));
        
        // Verifica si la solicitud fue exitosa
        if ($response->successful()) {
            // Redirige a la página de índice de transportistas con un mensaje de éxito
            return redirect()->route('shippers.index')->with('success', 'Transportista creado exitosamente');
        } else {
            // Si la solicitud falla, muestra un mensaje de error con la respuesta del servidor
            return back()->withInput()->withErrors(['error' => 'Error al crear el transportista: ' . $response->body()]);
        }
    } catch (\Exception $e) {
        // Si se produce una excepción, muestra un mensaje de error genérico
        return back()->withInput()->withErrors(['error' => 'Se produjo un error al procesar la solicitud: ' . $e->getMessage()]);
    }
}

    public function show($id)
    {
        $token = $this->getToken();
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '. $token,

        ])->get($this->apiBaseUrl.'/shippers/'.$id);
        $shipper = json_decode($response->body(), true);
        return view('administrador.shippers.show', compact('shipper'));
    }

    public function edit($id)
{
    $token = $this->getToken();
    $response = Http::withHeaders([
        'Authorization' => 'Bearer '. $token
    ])->get($this->apiBaseUrl.'/shippers/'.$id);
    $shipper = json_decode($response->body(), true);

    // Aquí es donde usas dd() para depurar
    //dd($shipper);

    return view('administrador.shippers.edit', compact('shipper'));
}



    public function update(Request $request, $id)
{
    $image = $request->file('image');
    
    try {
        // Realiza la solicitud HTTP para actualizar el transportista
        $token = $this->getToken();
        
        // Inicializa la variable $response sin adjuntar la imagen
        $http = Http::withHeaders([
                'Authorization' => 'Bearer '. $token
        ]);
        
        // Verifica si el archivo de imagen existe
        if ($request->hasFile('image')) {
            // Adjunta la imagen a la solicitud si existe
            $http->attach(
                'image', file_get_contents($image), $image->getClientOriginalName()
            );
        }
        
        $response = $http->post($this->apiBaseUrl.'/shippers/'.$id, $request->except('_token'));
        
        // Verifica si la solicitud fue exitosa
        if ($response->successful()) {
            // Redirige a la página de índice de transportistas con un mensaje de éxito
            return redirect()->route('shippers.index')->with('success', 'Transportista actualizado exitosamente');
        } else {
            // Si la solicitud falla, muestra un mensaje de error con la respuesta del servidor
            return back()->withInput()->withErrors(['error' => 'Error al actualizar el transportista: ' . $response->body()]);
        }
    } catch (\Exception $e) {
        // Si se produce una excepción, muestra un mensaje de error genérico
        return back()->withInput()->withErrors(['error' => 'Se produjo un error al procesar la solicitud: ' . $e->getMessage()]);
    }
}



    public function destroy($id)
    {
        $token = $this->getToken();
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '. $token,

        ])->delete($this->apiBaseUrl.'/shippers/'.$id);
        return redirect()->route('shippers.index')->with('success', 'Transportista eliminado exitosamente');
    }

    private function getToken() {
        // Obtener el token de la sesión
        $token = session('auth_token');
    
        // Verificar si el token existe en la sesión
        if ($token) {
            return $token;
        } else {
            // Si el token no está en la sesión, manejar el caso de error
            return 'Error: Token de autenticación no encontrado en la sesión';
        }
    }
}
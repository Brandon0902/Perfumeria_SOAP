<?php

namespace App\Http\Controllers;

use App\Models\Shippers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\JsonResponse;

class ShippersController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        // Verificar si el usuario está autenticado
        if (!$request->user()) {
            return response()->json(['error' => 'Debe iniciar sesión para acceder a esta ruta.'], 401);
        }

        $shippers = Shippers::all();
        return new JsonResponse(['shippers' => $shippers]);
    }

    public function store(Request $request)
    {
        // Validar los datos recibidos en la solicitud
        $validator = Validator::make($request->all(), [
            'companyname' => 'required|string|max:255',
            'phone' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'companyname.required' => 'El nombre de la empresa es requerido.',
            'companyname.string' => 'El nombre de la empresa debe ser una cadena de caracteres.',
            'companyname.max' => 'El nombre de la empresa no debe exceder los :max caracteres.',
            'phone.required' => 'El número de teléfono es requerido.',
            'phone.string' => 'El número de teléfono debe ser una cadena de caracteres.',
            'image.image' => 'El archivo debe ser una imagen.',
            'image.mimes' => 'La imagen debe ser de tipo jpeg, png, jpg o gif.',
            'image.max' => 'La imagen no debe exceder los :max kilobytes de tamaño.',
        ]);

        // Si la validación falla, retorna los errores
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], Response::HTTP_BAD_REQUEST);
        }

        // Instancia un nuevo objeto de Transportista (Shippers)
        $transportista = new Shippers();

        // Asigna los valores recibidos en la solicitud a las propiedades del transportista
        $transportista->companyname = $request->input('companyname');
        $transportista->phone = $request->input('phone');

        // Procesamiento de la imagen si se proporciona
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Generar un nombre único para la imagen
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();

            // Mover la imagen a la carpeta de imágenes
            $image->move(public_path('images'), $imageName);

            // Construir la URL completa de la imagen
            $imageUrl = url('images/' . $imageName);

            // Actualizar el campo de imagen en el modelo con la URL
            $transportista->image = $imageUrl;
        }

        // Guarda el nuevo transportista en la base de datos
        $transportista->save();

        // Retorna una respuesta JSON indicando que el transportista se creó exitosamente
        return response()->json(['message' => 'Transportista creado exitosamente'], Response::HTTP_CREATED);
    }

    public function show($id): JsonResponse
    {
        $shipper = Shippers::find($id);
        if (!$shipper) {
            return new JsonResponse(['error' => 'El transportista no existe'], Response::HTTP_NOT_FOUND);
        }
        return new JsonResponse(['shipper' => $shipper]);
    }

    public function update(Request $request, $id)
    {
        // Encuentra el transportista por su ID
        $transportista = Shippers::find($id);

        // Si no se encuentra el transportista, devuelve un error
        if (!$transportista) {
            return response()->json(['error' => 'El transportista no existe'], Response::HTTP_NOT_FOUND);
        }

        // Validar los datos recibidos en la solicitud
        $validator = Validator::make($request->all(), [
            'companyname' => 'required|string|max:255',
            'phone' => 'required|string',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'phone.string' => 'El número de teléfono debe ser una cadena de caracteres.',
            'image.image' => 'El archivo debe ser una imagen.',
            'image.mimes' => 'La imagen debe ser de tipo jpeg, png, jpg o gif.',
            'image.max' => 'La imagen no debe exceder los :max kilobytes de tamaño.',
        ]);

        // Si la validación falla, devuelve los errores
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], Response::HTTP_BAD_REQUEST);
        }

        // Procesamiento de la imagen si se proporciona
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Generar un nombre único para la imagen
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();

            // Mover la imagen a la carpeta de imágenes
            $image->move(public_path('images'), $imageName);

            // Construir la URL completa de la imagen
            $imageUrl = url('images/' . $imageName);

            // Actualizar el campo de imagen en el modelo con la URL
            $transportista->image = $imageUrl;
        }

        // Actualiza los datos del transportista con los datos recibidos en la solicitud
        $transportista->companyname = $request->input('companyname', $transportista->companyname);
        $transportista->phone = $request->input('phone', $transportista->phone);

        // Guarda los cambios en la base de datos
        $transportista->save();

        // Devuelve un mensaje de éxito
        return response()->json(['message' => 'Transportista actualizado exitosamente'], Response::HTTP_OK);
    }

    public function destroy($id): JsonResponse
    {
        $shipper = Shippers::find($id);
        if (!$shipper) {
            return new JsonResponse(['error' => 'El transportista no existe'], Response::HTTP_NOT_FOUND);
        }

        $shipper->delete();
        return new JsonResponse(['message' => 'Transportista eliminado exitosamente'], Response::HTTP_OK);
    }
}
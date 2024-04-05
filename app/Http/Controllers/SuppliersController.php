<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\JsonResponse;

class SuppliersController extends Controller
{
    public function index(): JsonResponse
    {
        $suppliers = Supplier::all();
        return response()->json(['suppliers' => $suppliers]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'companyName' => 'required|string|max:255',
            'contactName' => 'required|string|max:255',
            'contactTitle' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'postalCode' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'fax' => 'nullable|string|max:255',
            'homePage' => 'nullable|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], Response::HTTP_BAD_REQUEST);
        }

        $proveedor = new Supplier($request->except('_token'));

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $imageUrl = url('images/' . $imageName);
            $categoria->image = $imageUrl;
        }

        $proveedor->save();

        return response()->json(['message' => 'Proveedor creado exitosamente'], Response::HTTP_CREATED);
    }

    public function show($id): JsonResponse
    {
        $supplier = Supplier::find($id);

        if (!$supplier) {
            return response()->json(['error' => 'El proveedor no existe'], Response::HTTP_NOT_FOUND);
        }

        return response()->json(['supplier' => $supplier]);
    }

    public function update(Request $request, $id)
    {
        // Encuentra el proveedor por su ID
        $supplier = Supplier::find($id);

        // Si no se encuentra el proveedor, devuelve un error
        if (!$supplier) {
            return response()->json(['error' => 'El proveedor no existe'], Response::HTTP_NOT_FOUND);
        }

        // Validar los datos recibidos en la solicitud
        $validator = Validator::make($request->all(), [
            'companyName' => 'required|string|max:255',
            'contactName' => 'required|string|max:255',
            'contactTitle' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'postalCode' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'fax' => 'required|string|max:255',
            'homePage' => 'required|string|max:255',
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
            $supplier->image = $imageUrl;
        }

        // Actualiza los datos del proveedor con los datos recibidos en la solicitud
        $supplier->companyName = $request->input('companyName', $supplier->companyName);
        $supplier->contactName = $request->input('contactName', $supplier->contactName);
        $supplier->contactTitle = $request->input('contactTitle', $supplier->contactTitle);
        $supplier->address = $request->input('address', $supplier->address);
        $supplier->city = $request->input('city', $supplier->city);
        $supplier->region = $request->input('region', $supplier->region);
        $supplier->postalCode = $request->input('postalCode', $supplier->postalCode);
        $supplier->country = $request->input('country', $supplier->country);
        $supplier->phone = $request->input('phone', $supplier->phone);
        $supplier->fax = $request->input('fax', $supplier->fax);
        $supplier->homePage = $request->input('homePage', $supplier->homePage);

        // Guarda los cambios en la base de datos
        $supplier->save();

        // Devuelve un mensaje de éxito
        return response()->json(['message' => 'Proveedor actualizado exitosamente'], Response::HTTP_OK);
    }


    public function destroy($id): JsonResponse
    {
        $supplier = Supplier::find($id);

        if (!$supplier) {
            return response()->json(['error' => 'El proveedor no existe'], Response::HTTP_NOT_FOUND);
        }

        $supplier->delete();

        return response()->json(['message' => 'Proveedor eliminado exitosamente'], Response::HTTP_OK);
    }
}

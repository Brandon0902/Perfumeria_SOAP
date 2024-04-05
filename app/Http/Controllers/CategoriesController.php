<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class CategoriesController extends Controller
{
    public function index(): JsonResponse
    {
        $categories = Categories::all();
        return response()->json(['categories' => $categories]);
    }

    public function show($id): JsonResponse
    {
        $categoria = Categories::find($id);

        if (!$categoria) {
            return response()->json(['error' => 'La categoría no existe'], 404);
        }

        return response()->json(['categoria' => $categoria]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'categoryName' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'categoryName.required' => 'El nombre de la categoría es requerido.',
            'categoryName.string' => 'El nombre de la categoría debe ser una cadena de caracteres.',
            'categoryName.max' => 'El nombre de la categoría no debe exceder los :max caracteres.',
            'description.required' => 'La descripción de la categoría es requerida.',
            'description.string' => 'La descripción de la categoría debe ser una cadena de caracteres.',
            'image.image' => 'El archivo debe ser una imagen.',
            'image.mimes' => 'La imagen debe ser de tipo jpeg, png, jpg o gif.',
            'image.max' => 'La imagen no debe exceder los :max kilobytes de tamaño.',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], Response::HTTP_BAD_REQUEST);
        }

        $categoria = new Categories([
            'categoryName' => $request->input('categoryName'),
            'description' => $request->input('description'),
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $imageUrl = url('images/' . $imageName);
            $categoria->image = $imageUrl;
        }

        $categoria->save();

        Log::info("Categoría ID {$categoria->id} creada exitosamente.");

        return response()->json(['message' => 'Categoría creada exitosamente'], Response::HTTP_CREATED);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $categoria = Categories::find($id);

        if (!$categoria) {
            return response()->json(['error' => 'La categoría no existe'], 404);
        }

        $validator = Validator::make($request->all(), [
            'categoryName' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'image.image' => 'El archivo debe ser una imagen.',
            'image.mimes' => 'La imagen debe ser de tipo jpeg, png, jpg o gif.',
            'image.max' => 'La imagen no debe exceder los :max kilobytes de tamaño.',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], Response::HTTP_BAD_REQUEST);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $imageUrl = url('images/' . $imageName);
            $categoria->image = $imageUrl;
        }

        $categoria->categoryName = $request->input('categoryName', $categoria->categoryName);
        $categoria->description = $request->input('description', $categoria->description);

        $categoria->save();

        return response()->json(['message' => 'Categoría actualizada exitosamente'], Response::HTTP_OK);
    }

    public function destroy($id): JsonResponse
    {
        $categoria = Categories::find($id);

        if (!$categoria) {
            return response()->json(['error' => 'La categoría no existe'], 404);
        }

        $categoria->delete();

        return response()->json(['message' => 'Categoría eliminada exitosamente'], Response::HTTP_OK);
    }
}

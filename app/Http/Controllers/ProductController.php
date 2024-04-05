<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(): JsonResponse
    {
        $products = Product::all();
        return response()->json(['products' => $products]);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'supplierId' => 'required|integer',
            'categoryId' => 'required|integer',
            'description' => 'required|string',
            'quantityPerUnit' => 'required|string',
            'price' => 'required|numeric',
            'unitsInStock' => 'required|integer',
            'unitsOnOrder' => 'required|integer',
            'reorderLevel' => 'required|integer',
            'discontinued' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], Response::HTTP_BAD_REQUEST);
        }

        $product = new Product($request->except(['_token', 'image', 'image2', 'image3']));

        $this->handleImages($request, $product);

        $product->save();

        return response()->json(['message' => 'Producto creado exitosamente', 'product' => $product], Response::HTTP_CREATED);
    }

    public function show($id): JsonResponse
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'El producto no existe'], Response::HTTP_NOT_FOUND);
        }

        return response()->json(['product' => $product]);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $product = Product::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'supplierId' => 'required|integer',
            'categoryId' => 'required|integer',
            'description' => 'required|string',
            'quantityPerUnit' => 'required|string',
            'price' => 'required|numeric',
            'unitsInStock' => 'required|integer',
            'unitsOnOrder' => 'required|integer',
            'reorderLevel' => 'required|integer',
            'discontinued' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], Response::HTTP_BAD_REQUEST);
        }

        $product->update($request->except(['_token', 'image', 'image2', 'image3']));

        $this->handleImages($request, $product);

        $product->save();

        return response()->json(['message' => 'Producto actualizado exitosamente', 'product' => $product], Response::HTTP_OK);
    }

    public function destroy($id): JsonResponse
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'El producto no existe'], Response::HTTP_NOT_FOUND);
        }

        $product->delete();

        return response()->json(['message' => 'Producto eliminado exitosamente'], Response::HTTP_OK);
    }

    private function handleImages(Request $request, Product $product)
    {
        $images = ['image', 'image2', 'image3'];
        foreach ($images as $imageField) {
            if ($request->hasFile($imageField)) {
                $image = $request->file($imageField);
                $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
                $imageUrl = url('images/' . $imageName);
                $product->{$imageField} = $imageUrl;
            }
        }
    }
}

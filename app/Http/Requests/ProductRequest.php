<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'supplierId' => 'required|integer',
            'categoryId' => 'required|integer',
            'description' => 'required|string',
            'quantityPerUnit' => 'required|string',
            'price' => 'required|numeric',
            'unitsInStock' => 'required|integer',
            'unitsOnOrder' => 'required|integer',
            'reorderLevel' => 'required|integer',
            'discontinued' => 'required|string', // No cambia esta validación
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validación de la imagen
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre del producto es requerido.',
            'name.string' => 'El nombre del producto debe ser una cadena de caracteres.',
            'name.max' => 'El nombre del producto no debe exceder los :max caracteres.',
            'supplierId.required' => 'El ID del proveedor es requerido.',
            'supplierId.integer' => 'El ID del proveedor debe ser un número entero.',
            'categoryId.required' => 'El ID de la categoría es requerido.',
            'categoryId.integer' => 'El ID de la categoría debe ser un número entero.',
            'description.required' => 'La descripción del producto es requerida.',
            'description.string' => 'La descripción del producto debe ser una cadena de caracteres.',
            'quantityPerUnit.required' => 'La cantidad por unidad del producto es requerida.',
            'quantityPerUnit.string' => 'La cantidad por unidad del producto debe ser una cadena de caracteres.',
            'price.required' => 'El precio del producto es requerido.',
            'price.numeric' => 'El precio del producto debe ser un número.',
            'unitsInStock.required' => 'Las unidades en stock del producto son requeridas.',
            'unitsInStock.integer' => 'Las unidades en stock del producto deben ser un número entero.',
            'unitsOnOrder.required' => 'Las unidades en orden del producto son requeridas.',
            'unitsOnOrder.integer' => 'Las unidades en orden del producto deben ser un número entero.',
            'reorderLevel.required' => 'El nivel de reorden del producto es requerido.',
            'reorderLevel.integer' => 'El nivel de reorden del producto debe ser un número entero.',
            'discontinued.required' => 'El estado de discontinuación del producto es requerido.',
            'image.image' => 'El archivo debe ser una imagen.',
            'image.mimes' => 'La imagen debe ser de tipo jpeg, png, jpg o gif.',
            'image.max' => 'La imagen no debe exceder los :max kilobytes de tamaño.',
        ];
    }
}

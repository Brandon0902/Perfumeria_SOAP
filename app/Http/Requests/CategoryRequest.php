<?php

namespace App\Http\Requests;

use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;


class CategoryRequest extends FormRequest
{

    protected function failedValidation(Validator $validator) {
        $error = (new ValidationException($validator))->errors();

        response()->json(
            ['errors' => $error],
            JsonResponse::HTTP_UNPROCESSABLE_ENTITY);

        parent::failedValidation($validator);

    }

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'categoryName' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'mimes:jpeg,png,jpg,gif|max:2048', 
        ];
    }

    public function messages()
    {
        return [
            'categoryName.required' => 'El nombre de la categoría es requerido.',
            'categoryName.string' => 'El nombre de la categoría debe ser una cadena de caracteres.',
            'categoryName.max' => 'El nombre de la categoría no debe exceder los :max caracteres.',
            'description.required' => 'La descripción de la categoría es requerida.',
            'description.string' => 'La descripción de la categoría debe ser una cadena de caracteres.',
            'image.image' => 'El archivo debe ser una imagen.',
            'image.mimes' => 'La imagen debe ser de tipo jpeg, png, jpg o gif.',
            'image.max' => 'La imagen no debe exceder los :max kilobytes de tamaño.',
        ];
    }
}

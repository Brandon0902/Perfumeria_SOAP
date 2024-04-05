<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShippersRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'companyname' => 'required|string|max:255',
            'phone' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validación de la imagen
        ];
    }

    public function messages()
    {
        return [
            'companyname.required' => 'El nombre de la empresa es requerido.',
            'companyname.string' => 'El nombre de la empresa debe ser una cadena de caracteres.',
            'companyname.max' => 'El nombre de la empresa no debe exceder los :max caracteres.',
            'phone.required' => 'El número de teléfono es requerido.',
            'phone.string' => 'El número de teléfono debe ser una cadena de caracteres.',
            'image.image' => 'El archivo debe ser una imagen.',
            'image.mimes' => 'La imagen debe ser de tipo jpeg, png, jpg o gif.',
            'image.max' => 'La imagen no debe exceder los :max kilobytes de tamaño.',
        ];
    }
}

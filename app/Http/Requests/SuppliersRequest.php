<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuppliersRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
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
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validación de la imagen
        ];
    }

    public function messages()
    {
        return [
            'companyName.required' => 'El nombre de la empresa es requerido.',
            'companyName.string' => 'El nombre de la empresa debe ser una cadena de caracteres.',
            'companyName.max' => 'El nombre de la empresa no debe exceder los :max caracteres.',
            'contactName.required' => 'El nombre del contacto es requerido.',
            'contactName.string' => 'El nombre del contacto debe ser una cadena de caracteres.',
            'contactName.max' => 'El nombre del contacto no debe exceder los :max caracteres.',
            'contactTitle.required' => 'El título del contacto es requerido.',
            'contactTitle.string' => 'El título del contacto debe ser una cadena de caracteres.',
            'contactTitle.max' => 'El título del contacto no debe exceder los :max caracteres.',
            'address.required' => 'La dirección es requerida.',
            'address.string' => 'La dirección debe ser una cadena de caracteres.',
            'address.max' => 'La dirección no debe exceder los :max caracteres.',
            'city.required' => 'La ciudad es requerida.',
            'city.string' => 'La ciudad debe ser una cadena de caracteres.',
            'city.max' => 'La ciudad no debe exceder los :max caracteres.',
            'region.required' => 'La región es requerida.',
            'region.string' => 'La región debe ser una cadena de caracteres.',
            'region.max' => 'La región no debe exceder los :max caracteres.',
            'postalCode.required' => 'El código postal es requerido.',
            'postalCode.string' => 'El código postal debe ser una cadena de caracteres.',
            'postalCode.max' => 'El código postal no debe exceder los :max caracteres.',
            'country.required' => 'El país es requerido.',
            'country.string' => 'El país debe ser una cadena de caracteres.',
            'country.max' => 'El país no debe exceder los :max caracteres.',
            'phone.required' => 'El número de teléfono es requerido.',
            'phone.string' => 'El número de teléfono debe ser una cadena de caracteres.',
            'phone.max' => 'El número de teléfono no debe exceder los :max caracteres.',
            'fax.string' => 'El número de fax debe ser una cadena de caracteres.',
            'fax.max' => 'El número de fax no debe exceder los :max caracteres.',
            'homePage.string' => 'La página de inicio debe ser una cadena de caracteres.',
            'homePage.max' => 'La página de inicio no debe exceder los :max caracteres.',
            'image.image' => 'El archivo debe ser una imagen.',
            'image.mimes' => 'La imagen debe ser de tipo jpeg, png, jpg o gif.',
            'image.max' => 'La imagen no debe exceder los :max kilobytes de tamaño.',
        ];
    }
}

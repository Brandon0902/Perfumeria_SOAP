@extends('layouts.frontend')

@section('content')
    <div class="container mx-auto py-8">
        <div class="flex flex-wrap">
            <div class="w-full md:w-1/2 md:pr-4">
                <div class="bg-white rounded-lg shadow-md">
                    <div class="p-6">
                        <h2 class="text-3xl font-semibold text-gray-800">{{ $productDetails['name'] }}</h2>
                        <div class="mt-4">
                            <p class="text-lg text-gray-700"><strong>Precio:</strong> ${{ $productDetails['price'] }}</p>
                            <p class="text-lg text-gray-700"><strong>Descripción:</strong> {{ $productDetails['description'] }}</p>
                            <p class="text-lg text-gray-700"><strong>Proveedor:</strong> {{ $productDetails['supplier'] }}</p>
                            <p class="text-lg text-gray-700"><strong>Región:</strong> {{ $productDetails['region'] }}</p>
                            <p class="text-lg text-gray-700"><strong>Categoría:</strong> {{ $productDetails['category'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 mt-4 md:mt-0">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset('images/' . $productDetails['image']) }}" alt="{{ $productDetails['name'] }}" class="w-full h-auto">
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.frontend')

@section('content')
    <div class="container px-6 mx-auto">

        <div class="text-center mt-8">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">¡Bienvenido a <span class="text-purple-600">LEONMEE</span>! Los mejores perfumes para todos</h1>
            <p class="text-lg text-gray-700">Explora nuestra selección de productos y descubre la esencia perfecta para ti.</p>
        </div>
        
        <!-- Contenedores circulares con imágenes -->
        <div class="flex justify-between mt-8">
            <div class="w-1/3 bg-gray-200 h-72 rounded-full flex items-center justify-center">
                <img src="{{ asset('images/leao.jpg') }}" class="w-full h-full rounded-full object-cover" alt="Imagen 1">
            </div>
            <div class="w-1/3 bg-gray-200 h-72 rounded-full flex items-center justify-center">
                <img src="{{ asset('images/leao2.jpeg') }}" class="w-full h-full rounded-full object-cover" alt="Imagen 2">
            </div>
            <div class="w-1/3 bg-gray-200 h-72 rounded-full flex items-center justify-center">
                <img src="{{ asset('images/leao3.jpeg') }}" class="w-full h-full rounded-full object-cover" alt="Imagen 3">
            </div>
        </div>

        <div class="text-center mt-8">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Unos de nuestros colaboradores <span class="text-purple-600">RAFAEL LEAÓ</span></h1>
            <p class="text-lg text-gray-700">Futbolista del AC Milan y como Artista WAY 45</p>
        </div>

        <!-- Resto de tu contenido -->
        <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($products as $product)
                <div class="w-full max-w-sm mx-auto overflow-hidden rounded-md shadow-md">
                    <div class="bg-cover" style="background-image: url('{{ asset('images/' . $product->image) }}'); height: 250px;"></div>
                    <div class="px-5 py-3">
                        <h3 class="text-gray-700 uppercase">{{ $product->name }}</h3>
                        <span class="mt-2 text-gray-500">${{ $product->price }}</span>
                        <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $product->id }}" name="id">
                            <input type="hidden" value="{{ $product->name }}" name="name">
                            <input type="hidden" value="{{ $product->price }}" name="price">
                            <input type="hidden" value="{{ $product->image }}"  name="image">
                            <input type="hidden" value="1" name="quantity">
                            <button class="px-4 py-2 text-white bg-blue-800 rounded">Añadir al carrito</button>
                        </form>
                        <a href="{{ route('product.detail', $product->id) }}" class="mt-2 inline-block text-gray-500 hover:text-blue-700">Ver</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

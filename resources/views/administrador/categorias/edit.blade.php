<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Categoría') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Editar Categoría: $categoria->categoryname") }}
                </div>
            </div>

            <form method="POST" action="{{ route('categories.update', $categoria) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="mb-4">
                    <label for="categoryName" class="block text-sm font-medium text-white">Nombre de la Categoría</label>
                    <input type="text" name="categoryName" id="categoryName" class="mt-1 p-2 border rounded-md w-full" value="{{ $categoria->categoryName }}" required>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-white">Descripción</label>
                    <input type="text" name="description" id="description" class="mt-1 p-2 border rounded-md w-full" value="{{ $categoria->description }}" required>
                </div>

                <!-- Mostrar imagen actual de la marca -->
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-white">Imagen actual de la Marca</label>
                    @if($categoria->image)
                        <img src="{{ asset('images/' . $categoria->image) }}" alt="{{ $categoria->name }}" class="h-16 w-16 rounded-full object-cover">
                    @else
                        Sin imagen
                    @endif
                </div>

                <div class="sm:col-span-3 mt-4">
                    <label for="image" class="block text-sm font-medium leading-6 text-white">Imagen</label>
                    <input type="file" name="image" id="image" class="block w-full py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>

                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 text-white p-2 rounded-md">Actualizar Categoría</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

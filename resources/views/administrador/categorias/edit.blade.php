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

            <form method="POST" action="{{ route('categories.update', $categoria) }}">
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

                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 text-white p-2 rounded-md">Actualizar Categoría</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

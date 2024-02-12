<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Marcas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Agregar una Marca") }}
                </div>
            </div>

            <form method="POST" action="{{ route('brands.store') }} " enctype="multipart/form-data">
                @csrf
                
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-white">Nombre de la Marca</label>
                    <input type="text" name="name" id="name" class="mt-1 p-2 border rounded-md w-full" required>
                </div>
                
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-white">Descripción</label>
                    <textarea name="description" id="description" class="mt-1 p-2 border rounded-md w-full" required></textarea>
                </div>

                <div class="sm:col-span-3">
                    <label for="image" class="block text-sm font-medium leading-6 text-white">Imagen</label>
                    <div class="mt-2">
                        <input type="file" name="image" id="image" accept="image/*" required
                            class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                
                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 text-white p-2 rounded-md">Guardar Marca</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

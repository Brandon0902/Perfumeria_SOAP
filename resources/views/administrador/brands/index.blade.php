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
                    {{ __("Lista de Marcas") }}
                </div>
            </div>

            <!-- Agregar botón para redirigir a la vista de creación -->
            <a href="{{ route('brands.create') }}" class="bg-green-500 text-white p-2 rounded-md mb-4">Crear Marca</a>


            <div class="bg-gray-800 text-white rounded-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Imagen</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nombre de la Marca</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Descripción</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Acciones</th>
                            
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        <!-- Loop sobre las marcas y mostrarlas en la tabla -->
                        @foreach($brands as $brand)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($brand->image)
                                    <img src="{{ asset('images/' . $brand->image) }}" alt="{{ $brand->name }}" class="h-16 w-16 rounded-full object-cover">
                                @else
                                    Sin imagen
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $brand->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $brand->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $brand->description }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('brands.edit', $brand) }}" class="text-blue-600 hover:text-blue-900">Editar</a>
                                <form action="{{ route('brands.destroy', $brand) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 ml-2">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

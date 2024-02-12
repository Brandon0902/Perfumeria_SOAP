<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Listado de Productos") }}
                </div>
            </div>

            <!-- Agregar botón para redirigir a la vista de creación -->
            <a href="{{ route('products.create') }}" class="bg-green-500 text-white p-2 rounded-md mb-4">Crear Producto</a>
            <!-- Tabla de productos -->
            <div class="max-w-full overflow-x-auto">
                <div class="bg-gray-800 text-white rounded-lg overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-700">
                        <thead class="bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Imagen</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nombre del Producto</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Proveedor</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Categoría</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Cantidad por Unidad</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Precio Unitario</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Unidades en Stock</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Unidades en Pedido</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nivel de Reorden</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Descon <br>tinuado</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            @foreach ($products as $product)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($product->image)
                                        <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->productName }}" class="h-16 w-16 rounded-full object-cover">
                                    @else
                                        Sin imagen
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $product->productName }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $product->supplierId }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $product->categoryId }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $product->quantityPerUnit }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $product->unitPrice }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $product->unitsInStock }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $product->unitsOnOrder }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $product->reorderLevel }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $product->discontinued ? 'Sí' : 'No' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <!-- Agrega enlaces a las acciones de editar y eliminar -->
                                    <a href="{{ route('products.edit', $product) }}" class="text-blue-500">Editar</a>
                                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 ml-2" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

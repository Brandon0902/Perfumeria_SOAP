<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Proveedores') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Lista de Proveedores") }}
                </div>
            </div>

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
                <div class="bg-gray-800 text-white rounded-lg overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-700">
                            <thead class="bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Imagen</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nombre de la Empresa</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nombre de Contacto</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Título de Contacto</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Dirección</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Ciudad</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Región</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Código Postal</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">País</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Teléfono</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Fax</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Página Principal</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-700">
                                @foreach($suppliers['suppliers'] as $supplier)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($supplier['image'])
                                            <img src="{{ $supplier['image'] }}" alt="{{ $supplier['companyName'] }}" class="h-16 w-16 rounded-full object-cover">
                                        @else
                                            Sin imagen
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $supplier['id'] }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $supplier['companyName'] }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $supplier['contactName'] }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $supplier['contactTitle'] }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $supplier['address'] }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $supplier['city'] }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $supplier['region'] }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $supplier['postalCode'] }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $supplier['country'] }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $supplier['phone'] }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $supplier['fax'] }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $supplier['homePage'] }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('suppliers.edit', $supplier['id']) }}" class="text-blue-500 hover:underline">Editar</a>
                                        <form action="{{ route('suppliers.destroy', $supplier['id']) }}" method="POST" class="inline">
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
        </div>
    </div>
</x-app-layout>

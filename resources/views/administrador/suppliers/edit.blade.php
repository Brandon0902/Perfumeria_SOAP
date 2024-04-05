<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Proveedor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Editar Proveedor") }}
                </div>
            </div>
            <form method="POST" action="{{ route('suppliers.update', $supplier['id']) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <!-- Campos del formulario -->
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="companyName" class="block text-sm font-medium leading-6 text-gray-700 dark:text-gray-200">Nombre de la Empresa</label>
                        <input type="text" name="companyName" id="companyName" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ $supplier['companyName'] }}">
                    </div>
                    <div class="sm:col-span-3">
                        <label for="contactName" class="block text-sm font-medium leading-6 text-gray-700 dark:text-gray-200">Nombre de Contacto</label>
                        <input type="text" name="contactName" id="contactName" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ $supplier['contactName'] }}">
                    </div>
                    <div class="sm:col-span-3">
                        <label for="contactTitle" class="block text-sm font-medium leading-6 text-gray-700 dark:text-gray-200">Título de Contacto</label>
                        <input type="text" name="contactTitle" id="contactTitle" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ $supplier['contactTitle'] }}">
                    </div>
                    <div class="sm:col-span-3">
                        <label for="address" class="block text-sm font-medium leading-6 text-gray-700 dark:text-gray-200">Dirección</label>
                        <input type="text" name="address" id="address" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ $supplier['address'] }}">
                    </div>
                    <div class="sm:col-span-3">
                        <label for="city" class="block text-sm font-medium leading-6 text-gray-700 dark:text-gray-200">Ciudad</label>
                        <input type="text" name="city" id="city" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ $supplier['city'] }}">
                    </div>
                    <div class="sm:col-span-3">
                        <label for="region" class="block text-sm font-medium leading-6 text-gray-700 dark:text-gray-200">Región</label>
                        <div class="mt-2">
                            <select id="region" name="region" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option {{ $supplier['region'] === 'Norteamerica' ? 'selected' : '' }}>Norteamerica</option>
                                <option {{ $supplier['region'] === 'Europa' ? 'selected' : '' }}>Europa</option>
                                <option {{ $supplier['region'] === 'Asia' ? 'selected' : '' }}>Asia</option>
                                <option {{ $supplier['region'] === 'Sudamerica' ? 'selected' : '' }}>Sudamerica</option>
                            </select>
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="postalCode" class="block text-sm font-medium leading-6 text-gray-700 dark:text-gray-200">Código Postal</label>
                        <input type="text" name="postalCode" id="postalCode" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ $supplier['postalCode'] }}">
                    </div>
                    <div class="sm:col-span-3">
                        <label for="country" class="block text-sm font-medium leading-6 text-gray-700 dark:text-gray-200">País</label>
                        <input type="text" name="country" id="country" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ $supplier['country'] }}">
                    </div>
                    <div class="sm:col-span-3">
                        <label for="phone" class="block text-sm font-medium leading-6 text-gray-700 dark:text-gray-200">Teléfono</label>
                        <input type="text" name="phone" id="phone" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ $supplier['phone'] }}">
                    </div>
                    <div class="sm:col-span-3">
                        <label for="fax" class="block text-sm font-medium leading-6 text-gray-700 dark:text-gray-200">Fax</label>
                        <input type="text" name="fax" id="fax" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ $supplier['fax'] }}">
                    </div>
                    <div class="sm:col-span-3">
                        <label for="homePage" class="block text-sm font-medium leading-6 text-gray-700 dark:text-gray-200">Página Principal</label>
                        <input type="text" name="homePage" id="homePage" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ $supplier['homePage'] }}">
                    </div>

                    <!-- Mostrar imagen actual del proveedor -->
                    <div class="sm:col-span-3">
                        <label for="image" class="block text-sm font-medium leading-6 text-gray-700 dark:text-gray-200">Imagen actual de la Marca</label>
                        @if($supplier['image'])
                            <img src="{{ $supplier['image'] }}" alt="{{ $supplier['companyName'] }}" class="h-16 w-16 rounded-full object-cover">
                        @else
                            Sin imagen
                        @endif
                    </div>

                    <!-- Campo para cargar una nueva imagen -->
                    <div class="sm:col-span-3 mt-4">
                        <label for="image" class="block text-sm font-medium leading-6 text-white">Nueva Imagen</label>
                        <input type="file" name="image" id="image" class="block w-full py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <!-- Botones de acción -->
                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <a href="{{ route('suppliers.index') }}" class="text-sm font-semibold leading-6 text-gray-900 dark:text-gray-200">Cancelar</a>
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

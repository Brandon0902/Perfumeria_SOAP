<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Agregar Producto") }}
                </div>
            </div>

            <form method="POST" action="{{ route('products.store') }}">
                @csrf

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="productName" class="block text-sm font-medium leading-6 text-white">Nombre del Producto</label>
                        <div class="mt-2">
                            <input type="text" name="productName" id="productName" class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="supplierId" class="block text-sm font-medium leading-6 text-white">ID del Proveedor</label>
                        <div class="mt-2">
                            <input type="text" name="supplierId" id="supplierId" class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="categoryId" class="block text-sm font-medium leading-6 text-white">ID de la Categoría</label>
                        <div class="mt-2">
                            <input type="text" name="categoryId" id="categoryId" class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="quantityPerUnit" class="block text-sm font-medium leading-6 text-white">Cantidad por Unidad</label>
                        <div class="mt-2">
                            <input type="text" name="quantityPerUnit" id="quantityPerUnit" class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="unitPrice" class="block text-sm font-medium leading-6 text-white">Precio Unitario</label>
                        <div class="mt-2">
                            <input type="text" name="unitPrice" id="unitPrice" class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="unitsInStock" class="block text-sm font-medium leading-6 text-white">Unidades en Stock</label>
                        <div class="mt-2">
                            <input type="text" name="unitsInStock" id="unitsInStock" class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="unitsOnOrder" class="block text-sm font-medium leading-6 text-white">Unidades en Orden</label>
                        <div class="mt-2">
                            <input type="text" name="unitsOnOrder" id="unitsOnOrder" class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="reoderLevel" class="block text-sm font-medium leading-6 text-white">Nivel de Reorden</label>
                        <div class="mt-2">
                            <input type="text" name="reoderLevel" id="reoderLevel" class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="discontinued" class="block text-sm font-medium leading-6 text-white">Descatalogado</label>
                        <div class="mt-2">
                            <select name="discontinued" id="discontinued" class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option value="1">Sí</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <a href="{{ route('products.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Cancelar</a>
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

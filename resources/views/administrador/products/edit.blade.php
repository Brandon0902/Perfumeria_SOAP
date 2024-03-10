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
                    {{ __("Editar Producto") }}
                </div>
            </div>

            <form method="POST" action="{{ route('products.update', $producto) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="productName" class="block text-sm font-medium text-white">Nombre del Producto</label>
                        <div class="mt-2">
                            <input type="text" name="name" id="productName" class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ old('productName', $producto->productName) }}" required>
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="supplierId" class="block text-sm font-medium text-white">Proveedor</label>
                        <div class="mt-2">
                            <input type="text" name="supplierId" id="supplierId" class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ old('supplierId', $producto->supplierId) }}" required>
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="categoryId" class="block text-sm font-medium text-white">Categoría</label>
                        <div class="mt-2">
                            <input type="text" name="categoryId" id="categoryId" class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ old('categoryId', $producto->categoryId) }}" required>
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="description" class="block text-sm font-medium text-white">Descripción</label>
                        <div class="mt-2">
                            <input type="text" name="description" id="categoryId" class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ old('categoryId', $producto->description) }}" required>
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="quantityPerUnit" class="block text-sm font-medium text-white">Cantidad por Unidad</label>
                        <div class="mt-2">
                            <input type="text" name="quantityPerUnit" id="quantityPerUnit" class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ old('quantityPerUnit', $producto->quantityPerUnit) }}" required>
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="unitPrice" class="block text-sm font-medium text-white">Precio Unitario</label>
                        <div class="mt-2">
                            <input type="text" name="price" id="unitPrice" class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ old('unitPrice', $producto->price) }}" required>
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="unitsInStock" class="block text-sm font-medium text-white">Unidades en Stock</label>
                        <div class="mt-2">
                            <input type="text" name="unitsInStock" id="unitsInStock" class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ old('unitsInStock', $producto->unitsInStock) }}" required>
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="unitsOnOrder" class="block text-sm font-medium text-white">Unidades en Pedido</label>
                        <div class="mt-2">
                            <input type="text" name="unitsOnOrder" id="unitsOnOrder" class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ old('unitsOnOrder', $producto->unitsOnOrder) }}" required>
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="reoderLevel" class="block text-sm font-medium text-white">Nivel de Reorden</label>
                        <div class="mt-2">
                            <input type="text" name="reorderLevel" id="reorderLevel" class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ old('reoderLevel', $producto->reorderLevel) }}" required>
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="discontinued" class="block text-sm font-medium text-white">Descontinuado</label>
                        <div class="mt-2">
                            <select name="discontinued" id="discontinued" class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option value="0" {{ old('discontinued', $producto->discontinued) == 0 ? 'selected' : '' }}>No</option>
                                <option value="1" {{ old('discontinued', $producto->discontinued) == 1 ? 'selected' : '' }}>Sí</option>
                            </select>
                        </div>
                    </div>

                    <!-- Mostrar imagen actual de la marca -->
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-white">Imagen actual de la Marca</label>
                    @if($producto->image)
                        <img src="{{ asset('images/' . $producto->image) }}" alt="{{ $producto->name }}" class="h-16 w-16 rounded-full object-cover">
                    @else
                        Sin imagen
                    @endif
                </div>

                <div class="sm:col-span-3 mt-4">
                    <label for="image" class="block text-sm font-medium leading-6 text-white">Imagen</label>
                    <input type="file" name="image" id="image" class="block w-full py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>

                <div class="sm:col-span-3 mt-4">
                    <label for="image" class="block text-sm font-medium leading-6 text-white">Imagen 2</label>
                    <input type="file" name="image2" id="image" class="block w-full py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>

                <div class="sm:col-span-3 mt-4">
                    <label for="image" class="block text-sm font-medium leading-6 text-white">Imagen 3</label>
                    <input type="file" name="image3" id="image" class="block w-full py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>

                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <a href="{{ route('products.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Cancelar</a>
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Actualizar Producto</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

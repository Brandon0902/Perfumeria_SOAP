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
                    {{ __("Agregar un producto") }}
                </div>
            </div>
         
            <form>
           
          
              <div class="mb-4">
                  <label for="productName" class="block text-sm font-medium text-white">Nombre de producto</label>
                  <input type="text" name="productName" id="productName" class="mt-1 p-2 border rounded-md w-full" required>
              </div>
          
              <div class="grid grid-cols-2 gap-4">
                  <div class="mb-4">
                      <label for="supplierId" class="block text-sm font-medium text-white">Proveedor</label>
                      <select name="supplierId" id="supplierId" class="mt-1 p-2 border rounded-md w-full" required>
                          <!-- Opciones del proveedor -->
                      </select>
                  </div>
          
                  <div class="mb-4">
                      <label for="categoryId" class="block text-sm font-medium text-white">Categoria</label>
                      <select name="categoryId" id="categoryId" class="mt-1 p-2 border rounded-md w-full" required>
                          <!-- Opciones de categoría -->
                      </select>
                  </div>
              </div>
          
              <div class="grid grid-cols-3 gap-4">
                <div class="mb-4">
                    <label for="quantityPerUnit" class="block text-sm font-medium text-white">Cantidad por Unidad</label>
                    <input type="text" name="quantityPerUnit" id="quantityPerUnit" class="mt-1 p-2 border rounded-md w-full" required>
                </div>
            
                <div class="mb-4">
                    <label for="unitPrice" class="block text-sm font-medium text-white">Precio Unitario</label>
                    <input type="text" name="unitPrice" id="unitPrice" class="mt-1 p-2 border rounded-md w-full" required>
                </div>
            
                <div class="mb-4">
                    <label for="unitsInStock" class="block text-sm font-medium text-white">Unidades en Stock</label>
                    <input type="text" name="unitsInStock" id="unitsInStock" class="mt-1 p-2 border rounded-md w-full" required>
                </div>
            </div>
            
            <div class="grid grid-cols-3 gap-4">
                <div class="mb-4">
                    <label for="unitsOnOrder" class="block text-sm font-medium text-white">Unidades en Pedido</label>
                    <input type="text" name="unitsOnOrder" id="unitsOnOrder" class="mt-1 p-2 border rounded-md w-full" required>
                </div>
            
                <div class="mb-4">
                    <label for="reoderLevel" class="block text-sm font-medium text-white">Nivel de Reorden</label>
                    <input type="text" name="reoderLevel" id="reoderLevel" class="mt-1 p-2 border rounded-md w-full" required>
                </div>
            
                <div class="mb-4">
                    <label for="discontinued" class="block text-sm font-medium text-white">Descontinuado</label>
                    <select name="discontinued" id="discontinued" class="mt-1 p-2 border rounded-md w-full" required>
                        <option value="0">No</option>
                        <option value="1">Sí</option>
                    </select
                </div>
            </div>
            
          
              <div class="mb-4">
                  <button type="submit" class="bg-blue-500 text-white p-2 rounded-md">Guardar Producto</button>
              </div>
          </form>
        </div>
        <h2 class="text-xl font-bold mb-4 text-white">Lista de Productos</h2>

<div class="bg-gray-800 text-white rounded-lg overflow-hidden">
    <table class="min-w-full divide-y divide-gray-700">
        <thead class="bg-gray-700">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">ID</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nombre del Producto</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">ID del Proveedor</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">ID de la Categoría</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Cantidad por Unidad</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Precio Unitario</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Unidades en Stock</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Unidades en Pedido</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nivel de Reorden</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Descontinuado</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-700">
            <!-- Filas de datos simulados -->
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">1</td>
                <td class="px-6 py-4 whitespace-nowrap">Lavanda</td>
                <td class="px-6 py-4 whitespace-nowrap">1</td>
                <td class="px-6 py-4 whitespace-nowrap">1</td>
                <td class="px-6 py-4 whitespace-nowrap">10 unidades</td>
                <td class="px-6 py-4 whitespace-nowrap">$25.00</td>
                <td class="px-6 py-4 whitespace-nowrap">100</td>
                <td class="px-6 py-4 whitespace-nowrap">20</td>
                <td class="px-6 py-4 whitespace-nowrap">10</td>
                <td class="px-6 py-4 whitespace-nowrap">No</td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">2</td>
                <td class="px-6 py-4 whitespace-nowrap">Play Boy</td>
                <td class="px-6 py-4 whitespace-nowrap">2</td>
                <td class="px-6 py-4 whitespace-nowrap">2</td>
                <td class="px-6 py-4 whitespace-nowrap">15 unidades</td>
                <td class="px-6 py-4 whitespace-nowrap">$30.00</td>
                <td class="px-6 py-4 whitespace-nowrap">80</td>
                <td class="px-6 py-4 whitespace-nowrap">15</td>
                <td class="px-6 py-4 whitespace-nowrap">15</td>
                <td class="px-6 py-4 whitespace-nowrap">No</td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">3</td>
                <td class="px-6 py-4 whitespace-nowrap">Dolche Ghabana</td>
                <td class="px-6 py-4 whitespace-nowrap">3</td>
                <td class="px-6 py-4 whitespace-nowrap">3</td>
                <td class="px-6 py-4 whitespace-nowrap">20 unidades</td>
                <td class="px-6 py-4 whitespace-nowrap">$40.00</td>
                <td class="px-6 py-4 whitespace-nowrap">120</td>
                <td class="px-6 py-4 whitespace-nowrap">25</td>
                <td class="px-6 py-4 whitespace-nowrap">8</td>
                <td class="px-6 py-4 whitespace-nowrap">No</td>
            </tr>
        </tbody>
    </table>
    </div>
</x-app-layout>

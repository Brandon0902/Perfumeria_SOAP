<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Proveedor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Agregar Proveerdor") }}
                </div>
            </div>
            <form>


                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                  <div class="sm:col-span-3">
                    <label for="companyName" class="block text-sm font-medium leading-6 text-white">Sitio Web del Proveedor</label>
                    <div class="mt-2">
                      <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                        <span class="flex select-none items-center pl-3  text-white sm:text-sm">workcation.com/</span>
                        <input type="text" name="companyName" id="companyName" class="block flex-1 border-0 bg-transparent py-1.5 pl-1  text-white placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="janesmith">
                      </div>
                    </div>
                  </div>
              </div>
        
              <div class="border-b border-gray-900/10 pb-12">
        
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                  <div class="sm:col-span-3">
                    <label for="contactName" class="block text-sm font-medium leading-6  text-white">Nombre de contacto</label>
                    <div class="mt-2">
                      <input type="text" name="contactName" id="contactName" class="block w-full rounded-md border-0 py-1.5  text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                  </div>
        
                  <div class="sm:col-span-3">
                    <label for="contactTitle" class="block text-sm font-medium leading-6  text-white">Titulo de contacto</label>
                    <div class="mt-2">
                      <input type="text" name="contactTitle" id="contactTitle" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5  text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                  </div>
        
                  <div class="sm:col-span-3">
                    <label for="address" class="block text-sm font-medium leading-6  text-white">Dirección</label>
                    <div class="mt-2">
                      <input id="address" name="address" type="text" class="block w-full rounded-md border-0 py-1.5   text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                  </div>
        
                  <div class="sm:col-span-3">
                    <label for="city" class="block text-sm font-medium leading-6  text-white">Ciudad</label>
                    <div class="mt-2">
                      <input id="city" name="city" type="text" class="block w-full rounded-md border-0 py-1.5  text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                  </div>
        
                  <div class="sm:col-span-3">
                    <label for="region" class="block text-sm font-medium leading-6  text-white">Región</label>
                    <div class="mt-2">
                      <select id="region" name="region" class="block w-full rounded-md border-0 py-1.5  text-black shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                        <option>Norteamerica</option>
                        <option>Europa</option>
                        <option>Asia</option>
                        <option>Sudamerica</option>
                      </select>
                    </div>
                  </div>
        
                  <div class="sm:col-span-3">
                    <label for="postalCode" class="block text-sm font-medium leading-6  text-white">Código postal</label>
                    <div class="mt-2">
                      <input type="text" name="postalCode" id="postalCode" autocomplete="postal-code" class="block w-full rounded-md border-0 py-1.5  text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                  </div>
                </div>
              </div>
        
              <div class="sm:col-span-3">
                <label for="country" class="block text-sm font-medium leading-6  text-white">País</label>
                <div class="mt-2">
                  <input id="country" name="country" type="text" class="block w-full rounded-md border-0 py-1.5  text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
              </div>
        
              <div class="sm:col-span-3">
                <label for="phone" class="block text-sm font-medium leading-6  text-white">Teléfono</label>
                <div class="mt-2">
                  <input id="phone" name="phone" type="text" class="block w-full rounded-md border-0 py-1.5  text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
              </div>
        
              <div class="sm:col-span-3">
                <label for="fax" class="block text-sm font-medium leading-6  text-white">Fax</label>
                <div class="mt-2">
                  <input id="fax" name="fax" type="text" class="block w-full rounded-md border-0 py-1.5  text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
              </div>
        
              <div class="sm:col-span-3">
                <label for="homePage" class="block text-sm font-medium leading-6 text-white">Nombre de la compañia</label>
                <div class="mt-2">
                  <input id="homePage" name="homePage" type="text" class="block w-full rounded-md border-0 py-1.5  text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
              </div>
        
        
        
            <div class="mt-6 flex items-center justify-end gap-x-6">
              <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancelar</button>
              <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Guardar</button>
            </div>
          </form>
          <h2 class="text-xl font-bold mb-4 text-white">Lista de Proveedores</h2>

<div class="bg-gray-800 text-white rounded-lg overflow-hidden">
    <div class="overflow-auto">
        <table class="min-w-full divide-y divide-gray-700">
            <thead class="bg-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nombre de la Empresa</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nombre de Contacto</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Título de Contacto</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Dirección</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Ciudad</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Región</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">1</td>
                    <td class="px-6 py-4 whitespace-nowrap">Perfums Gardner</td>
                    <td class="px-6 py-4 whitespace-nowrap">Chiefs</td>
                    <td class="px-6 py-4 whitespace-nowrap">Proovedor</td>
                    <td class="px-6 py-4 whitespace-nowrap">Washington #657</td>
                    <td class="px-6 py-4 whitespace-nowrap">Amsterdam</td>
                    <td class="px-6 py-4 whitespace-nowrap">Europa</td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">2</td>
                    <td class="px-6 py-4 whitespace-nowrap">Perfumes Enrique</td>
                    <td class="px-6 py-4 whitespace-nowrap">Enrique</td>
                    <td class="px-6 py-4 whitespace-nowrap">Proovedor</td>
                    <td class="px-6 py-4 whitespace-nowrap">Eucalipto #52</td>
                    <td class="px-6 py-4 whitespace-nowrap">Monterrey</td>
                    <td class="px-6 py-4 whitespace-nowrap">Centroamerica</td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">3</td>
                    <td class="px-6 py-4 whitespace-nowrap">Wills Flowers</td>
                    <td class="px-6 py-4 whitespace-nowrap">Shing Chan</td>
                    <td class="px-6 py-4 whitespace-nowrap">Proovedor</td>
                    <td class="px-6 py-4 whitespace-nowrap">heunming #987</td>
                    <td class="px-6 py-4 whitespace-nowrap">Beijing</td>
                    <td class="px-6 py-4 whitespace-nowrap">Asia</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="overflow-auto">
        <table class="min-w-full divide-y divide-gray-700">
            <thead class="bg-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Código Postal</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">País</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Teléfono</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Fax</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Página Principal</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">12345</td>
                    <td class="px-6 py-4 whitespace-nowrap">Paises Bajos</td>
                    <td class="px-6 py-4 whitespace-nowrap">123-456-7890</td>
                    <td class="px-6 py-4 whitespace-nowrap">123-456-7891</td>
                    <td class="px-6 py-4 whitespace-nowrap">http://www.gardner.com</td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">67890</td>
                    <td class="px-6 py-4 whitespace-nowrap">Mexico</td>
                    <td class="px-6 py-4 whitespace-nowrap">987-654-3210</td>
                    <td class="px-6 py-4 whitespace-nowrap">987-654-3211</td>
                    <td class="px-6 py-4 whitespace-nowrap">http://www.enripe.com</td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">13579</td>
                    <td class="px-6 py-4 whitespace-nowrap">China</td>
                    <td class="px-6 py-4 whitespace-nowrap">555-123-4567</td>
                    <td class="px-6 py-4 whitespace-nowrap">555-123-4568</td>
                    <td class="px-6 py-4 whitespace-nowrap">http://www.wiliflow.com</td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
</x-app-layout>

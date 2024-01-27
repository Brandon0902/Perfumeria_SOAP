<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transportista') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Agregar Transportista") }}
                </div>
            </div>
            <!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<form>
   
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base font-semibold leading-7 text-white">Repartidor</h2>
        <p class="mt-1 text-sm leading-6 text-white">Encargados de repartir</p>
        
        <div class="sm:col-span-3">
            <label for="id" class="block text-sm font-medium leading-6 text-white">Id</label>
            <div class="mt-2">
              <input id="id" name="id" type="id" autocomplete="id" required class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="companyname" class="block text-sm font-medium leading-6 text-white">Nombre de la compañia</label>
            <div class="mt-2">
              <input type="text" name="companyname" id="companyname" autocomplete="companyname" requ class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
  
          <div class="sm:col-span-3">
            <label for="phone" class="block text-sm font-medium leading-6 text-white">Numero celular</label>
            <div class="mt-2">
              <input type="text" name="phone" id="phone" autocomplete="phone" required class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
  
      </div>
      <div class="mt-6 flex items-center justify-end gap-x-6">
        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
      </div>
    </form>
        </div>
    </div>
</x-app-layout>

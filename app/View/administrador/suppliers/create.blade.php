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
    
  
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-3">
            <label for="companyName" class="block text-sm font-medium leading-6 text-gray-900">Nombre de la compañia</label>
            <div class="mt-2">
              <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">workcation.com/</span>
                <input type="text" name="companyName" id="companyName" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="janesmith">
              </div>
            </div>
          </div>
      </div>
  
      <div class="border-b border-gray-900/10 pb-12">
  
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-3">
            <label for="contactName" class="block text-sm font-medium leading-6 text-gray-900">Nombre de contacto</label>
            <div class="mt-2">
              <input type="text" name="contactName" id="contactName" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
  
          <div class="sm:col-span-3">
            <label for="contactTitle" class="block text-sm font-medium leading-6 text-gray-900">Titulo de contacto</label>
            <div class="mt-2">
              <input type="text" name="contactTitle" id="contactTitle" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
  
          <div class="sm:col-span-3">
            <label for="address" class="block text-sm font-medium leading-6 text-gray-900">Dirección</label>
            <div class="mt-2">
              <input id="address" name="address" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Ciudad</label>
            <div class="mt-2">
              <input id="city" name="city" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
  
          <div class="sm:col-span-3">
            <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Región</label>
            <div class="mt-2">
              <select id="region" name="region" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                <option>Norteamerica</option>
                <option>Europa</option>
                <option>Asia</option>
                <option>Sudamerica</option>
              </select>
            </div>
          </div>
  
          <div class="sm:col-span-3">
            <label for="postalCode" class="block text-sm font-medium leading-6 text-gray-900">Código postal</label>
            <div class="mt-2">
              <input type="text" name="postalCode" id="postalCode" autocomplete="postal-code" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
        </div>
      </div>

      <div class="sm:col-span-3">
        <label for="country" class="block text-sm font-medium leading-6 text-gray-900">País</label>
        <div class="mt-2">
          <input id="country" name="country" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div class="sm:col-span-3">
        <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Teléfono</label>
        <div class="mt-2">
          <input id="phone" name="phone" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div class="sm:col-span-3">
        <label for="fax" class="block text-sm font-medium leading-6 text-gray-900">Fax</label>
        <div class="mt-2">
          <input id="fax" name="fax" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div class="sm:col-span-3">
        <label for="homePage" class="block text-sm font-medium leading-6 text-gray-900">URL del proveerdor</label>
        <div class="mt-2">
          <input id="homePage" name="homePage" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>
  
      
  
    <div class="mt-6 flex items-center justify-end gap-x-6">
      <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancelar</button>
      <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Guardar</button>
    </div>
  </form>
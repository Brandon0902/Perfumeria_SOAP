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
                    {{ __("Agregar una Marca") }}
                </div>
            </div>
         
            <form>
            
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-white">Nombre de la Marca</label>
                    <input type="text" name="name" id="name" class="mt-1 p-2 border rounded-md w-full" required>
                </div>
            
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-white">Descripción</label>
                    <textarea name="description" id="description" class="mt-1 p-2 border rounded-md w-full" required></textarea>
                </div>
            
                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 text-white p-2 rounded-md">Guardar Marca</button>
                </div>
            </form>
            <h2 class="text-xl font-bold mb-4 text-white">Lista de Marcas</h2>

        <div class="bg-gray-800 text-white rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-700">
                <thead class="bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nombre de la Marca</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Descripción</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    <!-- Filas de datos simulados -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">1</td>
                        <td class="px-6 py-4 whitespace-nowrap">Chanel</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            Su línea de perfumes fue creada oficialmente en 1924, logrando rápidamente captar la atención de <br> 
                            model de la capital francesa para luego tomar por asalto a toda Europa. Dentro de la línea de <br>
                            perfumes más populares que posee Chanel se encuentran por ejemplo Chance, Chanel N°5, Coco <br>
                            Mademoiselle, Cristalle o Allure por citar algunos ejemplos. Estos perfumes tienen <br>
                            características resaltantes como por ejemplo contener mandarinas o melones <br>
                            usualmente dentro de la fabricación de los mismos.
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">2</td>
                        <td class="px-6 py-4 whitespace-nowrap">Carolina Herrera</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            Los perfumes de Carolina Herrera tienen un gran éxito en el público femenino por lograr hacer <br>
                            sentir identificadas a todas las mujeres que tienen la dicha de usarlas.Dentro de los <br>
                            elementos característicos que conforman a estos perfumes se encuentran la atracción, <br>
                            sensualidad, así como también la vitalidad como fuente eterna de la juventud. <br>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">3</td>
                        <td class="px-6 py-4 whitespace-nowrap">Dior</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                             Al hablar de Dior automáticamente pensamos en la clase y refinamiento que suelen tener <br>
                             sus productos tales como vestidos o perfumes, entre otros. Esta empresa fue fundada <br>
                             en el año de 1947 por Christian Dior. Desde su fundación ha pasado por diversas <br>
                             manos a nivel de presidencia, pero realmente la calidad ha sido la misma <br>
                             durante mucho tiempo.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

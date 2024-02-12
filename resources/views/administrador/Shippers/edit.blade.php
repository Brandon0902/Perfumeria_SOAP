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
                    {{ __("Editar Transportista") }}
                </div>
            </div>

            <form action="{{ route('shippers.update', $transportista->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-white">Repartidor</h2>
                    <p class="mt-1 text-sm leading-6 text-white">Encargados de repartir</p>

                    <div class="sm:col-span-3">
                        <label for="companyname" class="block text-sm font-medium leading-6 text-white">Nombre de la compañía</label>
                        <div class="mt-2">
                            <input type="text" name="companyname" id="companyname" autocomplete="companyname" required class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ $transportista->companyname }}">
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="phone" class="block text-sm font-medium leading-6 text-white">Número celular</label>
                        <div class="mt-2">
                            <input type="text" name="phone" id="phone" autocomplete="phone" required class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ $transportista->phone }}">
                        </div>
                    </div>

                     <!-- Mostrar imagen actual de la marca -->
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-white">Imagen actual de la Marca</label>
                    @if($transportista->image)
                        <img src="{{ asset('images/' . $transportista->image) }}" alt="{{ $transportista->name }}" class="h-16 w-16 rounded-full object-cover">
                    @else
                        Sin imagen
                    @endif
                </div>

                <div class="sm:col-span-3 mt-4">
                    <label for="image" class="block text-sm font-medium leading-6 text-white">Imagen</label>
                    <input type="file" name="image" id="image" class="block w-full py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>

                </div>
                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancelar</button>
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

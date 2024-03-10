@extends('layouts.frontend')

@section('content')
<main class="my-8">
    <div class="container px-6 mx-auto">
        <div class="flex justify-center my-6">
            <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                <h3 class="text-3xl text-bold">Confirmar Pedido</h3>
                <form action="{{ route('order.place') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">

                        <input type="hidden" name="userId" value="{{ auth()->id() }}">
                        <div>
                            <label for="userCity" class="block text-sm font-medium text-gray-700">Ciudad</label>
                            <input type="text" name="userCity" id="userCity" autocomplete="userCity" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="userPostalCode" class="block text-sm font-medium text-gray-700">Código Postal</label>
                            <input type="text" name="userPostalCode" id="userPostalCode" autocomplete="userPostalCode" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="userColony" class="block text-sm font-medium text-gray-700">Colonia</label>
                            <input type="text" name="userColony" id="userColony" autocomplete="userColony" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="userAddress" class="block text-sm font-medium text-gray-700">Dirección</label>
                            <input type="text" name="userAddress" id="userAddress" autocomplete="userAddress" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="shipVia" class="block text-sm font-medium text-gray-700">Transportista</label>
                            <select id="shipVia" name="shipVia" autocomplete="shipVia" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                @foreach ($shippers as $shipper)
                                    <option value="{{ $shipper->id }}">{{ $shipper->companyname }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="freight" class="block text-sm font-medium text-gray-700">Método de Envío</label>
                            <select id="freight" name="freight" autocomplete="freight" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <option value="300">Envío Rápido (+$300)</option>
                                <option value="100">Envío Estándar (+$100)</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <button type="submit" class="inline-block px-6 py-3 text-white bg-green-500 hover:bg-green-600 rounded-md" >
                            Confirmar Pedido
                        </button>
                    </div>
                   
                </form>
            </div>
        </div>
    </div>
</main>
@endsection

@extends('layouts.frontend')

@section('content')
    <div class="container px-6 mx-auto">
        <h1 class="text-3xl font-semibold mb-4">Detalles de la Orden</h1>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-4 border-b">
                <h2 class="text-xl font-semibold mb-2">Información de la Orden</h2>
                <p><strong>ID de Orden:</strong> {{ $order->id }}</p>
                <p><strong>Fecha de Orden:</strong> {{ $order->orderDate }}</p>
                <p><strong>Dirección de Envío:</strong> {{ $order->userAddress }}, {{ $order->userColony }}, {{ $order->userCity }}, {{ $order->userPostalCode }}</p>
                <p><strong>Método de Envío:</strong> {{ $order->shipper['companyname'] }}</p>
                <p><strong>Costo de Envío:</strong> ${{ number_format($order->freight, 2) }}</p>
            </div>

            <div class="p-4 border-b">
                <h2 class="text-xl font-semibold mb-2">Productos</h2>
                <ul>
                    @foreach ($order->orderProducts as $orderProduct)
                    <li class="flex items-center border-b py-2">
                        <img src="{{ $orderProduct->product->image }}" alt="{{ $orderProduct->product->name }}" class="w-16 h-16 object-cover rounded">
                        <div class="ml-4">
                            <p class="text-lg font-semibold">{{ $orderProduct->product->name }}</p>
                            <p>Cantidad: {{ $orderProduct->quantity }}</p>
                            <p>Precio: ${{ number_format($orderProduct->price, 2) }}</p>
                        </div>
                    </li>
                @endforeach
                </ul>
            </div>

            <div class="p-4 border-b">
                <h2 class="text-xl font-semibold mb-2">Total de la Orden</h2>
                <p class="text-lg font-semibold">Total: ${{ number_format($order->total_amount, 2) }}</p> <!-- Cambio aquí -->
            </div>
        </div>
    </div>
    @yield('footer')
@endsection

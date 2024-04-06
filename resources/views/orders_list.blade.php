@extends('layouts.frontend')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Mis Pedidos</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($orders as $order)
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Pedido #{{ $order->id }}</h2>
            <p class="text-gray-600 mb-4">Fecha: {{ $order->created_at }}</p>
            <p class="text-gray-600 mb-4">Total:{{ number_format($order->total_amount, 2) }}</p>
            <a href="{{ route('order.detail', ['orderId' => $order->id]) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Ver Detalles</a>
        </div>
        @endforeach
    </div>
</div>
@yield('footer')
@endsection

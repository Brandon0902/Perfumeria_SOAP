<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Shippers;
use Cart;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    public function create()
    {
        $shippers = Shippers::all();
        return view('order', compact('shippers'));
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'userCity' => 'required|string',
            'userPostalCode' => 'required|string',
            'userColony' => 'required|string',
            'userAddress' => 'required|string',
            'freight' => 'required|numeric|in:100,300',
        ]);
    
        // Obtener el precio del envío según el método seleccionado
        $freight = $request->input('freight');
    
        // Obtener el ID del usuario autenticado
        $userId = $request->user()->id;
    
        // Crear la orden
        $order = new Order([
            'userId' => $userId, // Obtener el ID del usuario autenticado
            'orderDate' => now(), // Fecha actual
            'userCity' => $request->input('userCity'),
            'userPostalCode' => $request->input('userPostalCode'),
            'userColony' => $request->input('userColony'),
            'userAddress' => $request->input('userAddress'),
            'shipVia' => $request->input('shipVia'),
            'freight' => $freight,
        ]);
        $order->save();
    
        // Asociar productos del carrito a la orden y restar el stock
        $cartItems = Cart::getContent();
        foreach ($cartItems as $item) {
            $orderProduct = new OrderProduct([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'quantity' => $item->quantity,
                'price' => $item->price,
            ]);
            $orderProduct->save();
    
            // Restar el stock del producto
            $product = $orderProduct->product;
            if ($product) {
                $product->unitsInStock -= $item->quantity;
                $product->save();
            }
        }
    
        // Calcular el precio total de los productos
        $totalPrice = Cart::getTotal();
    
        // Sumar el costo del envío al total
        $totalPrice += $freight;

    
        // Actualizar el campo 'total_amount' de la orden
        $order->total_amount = $totalPrice;
        $order->save();

        // Guardar el totalPrice en la sesión para que esté disponible en otros controladores
        $request->session()->put('totalPrice', $totalPrice);
    
        // Limpiar el carrito después de realizar la compra
        Cart::clear();
    
        // Redirigir al usuario a la vista de detalle de la orden recién creada
        return redirect()->route('order.show', ['orderId' => $order->id])->with('success', 'Order placed successfully. Your cart has been cleared.');
    }

    public function show($orderId)
    {
        // Obtener la orden y cargar la relación 'orderProducts' con sus productos asociados
        $order = Order::with('orderProducts.product')->findOrFail($orderId);

        // Cargar la relación 'shipper'
        $order->load('shipper');

        // Calcular el total de la orden sumando los precios de los productos
        $totalPrice = 0;
        foreach ($order->orderProducts as $orderProduct) {
            $totalPrice += $orderProduct->quantity * $orderProduct->product->price;
        }

        // Sumar el costo del envío al total
        $totalPrice += $order->freight;

        // Pasar los datos a la vista para mostrarlos
        return view('show', [
            'order' => $order,
            'totalPrice' => $totalPrice,
        ]);
    }

    public function orderDetail($orderId)
    {
        // Obtener la orden y cargar la relación 'orderProducts' con sus productos asociados
        $order = Order::with('orderProducts.product')->findOrFail($orderId);

        // Cargar la relación 'shipper'
        $order->load('shipper');

        // Calcular el total de la orden sumando los precios de los productos
        $totalPrice = 0;
        foreach ($order->orderProducts as $orderProduct) {
            $totalPrice += $orderProduct->quantity * $orderProduct->product->price;
        }

        // Sumar el costo del envío al total
        $totalPrice += $order->freight;

        // Pasar los datos a la vista para mostrarlos
        return view('detail_order', [
            'order' => $order,
            'totalPrice' => $totalPrice,
        ]);
    }

    public function listOrdersByUser()
    {
        // Obtener el ID del usuario autenticado
        $userId = auth()->id();

        // Obtener todos los pedidos asociados al usuario autenticado
        $orders = Order::where('userId', $userId)->get();

        // Puedes retornar los pedidos a una vista o hacer lo que necesites con ellos
        return view('orders_list', ['orders' => $orders]);
    }
}

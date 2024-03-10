<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Shippers;
use App\Models\Product;
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
    
        // Obtener los elementos del carrito de la sesión
        $cartItems = Cart::getContent();
        
        // Inicializar el precio total de la orden
        $totalPrice = 0;
        
        // Calcular el precio total de los productos en el carrito
        foreach ($cartItems as $item) {
            $totalPrice += $item->quantity * $item->price;
        }
    
        // Agregar el costo del envío al precio total
        $totalPrice += $freight;
    
        // Crear la orden
        $order = new Order([
            'userId' => $userId, 
            'orderDate' => now(), 
            'userCity' => $request->input('userCity'),
            'userPostalCode' => $request->input('userPostalCode'),
            'userColony' => $request->input('userColony'),
            'userAddress' => $request->input('userAddress'),
            'shipVia' => $request->input('shipVia'),
            'freight' => $freight,
            'totalPrice' => $totalPrice, // Se asigna el precio total de la orden
        ]);

        // Guardar la orden
        $order->save();
    
        // Asociar productos del carrito a la orden
        foreach ($cartItems as $item) {
            $orderProduct = new OrderProduct([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'quantity' => $item->quantity,
                'price' => $item->price,
            ]);
            $orderProduct->save();

            // Restar el stock del producto
            $product = Product::find($item->id);
            $product->unitsInStock -= $item->quantity;
            $product->save();
        }
    
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

        // Pasar los datos a la vista para mostrarlos
        return view('show', [
            'order' => $order,
        ]);
    }
}

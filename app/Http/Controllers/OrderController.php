<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Shippers;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        // Verifica si se proporciona un ID en la URL
        if ($request->has('id')) {
            // Obtén el ID de la solicitud
            $orderId = $request->input('id');
            
            // Busca la orden por su ID
            $order = Order::find($orderId);

            // Verifica si se encontró la orden
            if ($order) {
                return response()->json(['order' => $order]);
            } else {
                return response()->json(['error' => 'La orden no existe'], 404);
            }
        }

        // Si no se proporciona un ID, devuelve todas las órdenes
        $orders = Order::all();
        return response()->json(['orders' => $orders]);
    }

    public function show($id)
    {
        $order = Order::with('orderProducts.product')->findOrFail($id);

        if (!$order) {
            return response()->json(['error' => 'La orden no existe'], 404);
        }

        $order->load('shipper');

        return response()->json(['order' => $order]);
    }

    public function destroy($id)

    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['error' => 'La orden no existe'], 404);
        }

        $order->delete();

        return response()->json(['message' => 'Order deleted successfully']);
    }

}

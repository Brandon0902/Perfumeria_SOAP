<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Shippers;

class OrderProduct extends Model
{
    protected $fillable = [
        'order_id', // ID del pedido
        'product_id', // ID del producto
        'quantity', // Cantidad del producto en el pedido
        'price',
    ];

    // Reapp/Models/Order.phplación con el modelo Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Relación con el modelo Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

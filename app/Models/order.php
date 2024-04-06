<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    protected $fillable = [
        'userId',
        'productId',
        'orderDate',
        'shipVia',
        'freight',
        'userCity',
        'userPostalCode',
        'userColony',
        'userAddress',
        'total_amount'
    ];

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    // Relación con el modelo Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'productId');
    }

    // Relación con el modelo Shipper
    public function shipper()
    {
        return $this->belongsTo(Shippers::class, 'shipVia');
    }

    // Relación con el modelo OrderProduct
    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class, 'order_id');
    }
}


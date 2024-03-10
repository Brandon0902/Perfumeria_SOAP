<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Supplier;
use App\Models\Categories;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'supplierId',
        'categoryId',
        'description',
        'quantityPerUnit',
        'price',
        'unitsInStock',
        'unitsOnOrder',
        'reorderLevel',
        'discontinued',
        'image',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplierId');
    }

    public function category()
    {
        return $this->belongsTo(Categories::class, 'categoryId');
    }

    public function shippers(): HasMany
    {
        return $this->hasMany(Shipper::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function orderDetails(): HasMany
    {
        return $this->hasMany(OrderDetail::class);
    }
}

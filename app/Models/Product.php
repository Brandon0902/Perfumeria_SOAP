<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];

    public function suppliers(): HasMany
    {
        return $this->hasMany(Suppliers::class);
    }

    public function categories(): BelongsTo
    {
        return $this->belongsTo(Categories::class);
    }

    public function shippers(): BelongsTo
    {
        return $this->belongsTo(Shippers::class);
    }

    public function orders(): BelongsTo
    {
        return $this->belongsTo(Orders::class);
    }

    public function orderDetails(): HasMany
    {
        return $this->hasMany(OrderDetail::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
        
    }

    public function products(): HasMany
    {
        return $this->hasMany(Products::class);
        
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}

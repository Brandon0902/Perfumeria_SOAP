<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    public function suppliers():HasMany{
        return $this->hasMany(Suppliers::class);
    }

    public function categories():belongsTo{
        return $this->belongsTo(Categories::class);
    }

    public function shippers():belongsTo
    {
        return $this->belongsTo(Shippers::class);
    }

    public function orders():belongsTo
    {
        return $this->belongsTo(Orders::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}

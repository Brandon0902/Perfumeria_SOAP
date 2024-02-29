<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'companyName',
        'contactName',
        'contactTitle',
        'address',
        'city',
        'region',
        'postalCode',
        'country',
        'phone',
        'fax',
        'homePage',
        'image',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'supplierId');
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
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
    ];

    public function products()
    {
        return $this->belongsTo(Products::class);
    }
}

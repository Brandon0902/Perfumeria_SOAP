<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shippers extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'companyname',
        'phone',
    ];

    public function products()
    {
        return $this->hasMany(Products::class);
    }
}

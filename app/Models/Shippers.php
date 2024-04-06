<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shippers extends Model
{
    use HasFactory;

    protected $fillable = [
        'companyname',
        'phone',
        'image',
    ];

    public function orders()
    {
        return $this->hasMany(Orders::class, 'shipVia');
    }
}

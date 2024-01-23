<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    public function suppliers():HasMany{
        return this->hasMany(Suppliers::class);
    }

    public function categories():belongsTo{
        return this->belongsTo(Categories::class);
    }
}

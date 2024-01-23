<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    public function brands(): BelongsTo
    {
        return $this->belongsTo(Brands::class, 'brand_categories', 'brandId', 'categoryId');

    }

    
}

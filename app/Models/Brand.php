<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    public function categories(): BelongsTo
    {
        return $this->belongsTo(Categories::class, 'brand_categories', 'brandId', 'categoryId');

    }
}

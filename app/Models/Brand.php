<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function categories(): BelongsTo
    {
        return $this->belongsTo(Categories::class, 'brand_categories', 'brandId', 'categoryId');
    }
}

<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = ['categoryName', 'description', 'image'];

    public function brands(): BelongsTo
    {
        return $this->belongsTo(Brands::class, 'brand_categories', 'brandId', 'categoryId');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'categoryId');
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    use HasFactory;

    protected $guarded = [];

    // function to product variation to product table
    public function productDetails()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}

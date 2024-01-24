<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosCart extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = [
        'product_price'
    ];

    // function to get product details
    public function productDetails()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    // function to get product price
    public function getProductPriceAttribute()
    {
        if (isset($this->productDetails)) {
            if (is_null($this->productDetails->discount_type)) {
                $product_price = $this->productDetails->price * $this->quantity;
            } else {
                $product_price = ($this->productDetails->discount_type == 'percentage') ? ($this->productDetails->price - (($this->productDetails->price * $this->productDetails->discount_amount) / 100)) * $this->quantity : ($this->productDetails->price - $this->productDetails->discount_amount) * $this->quantity;
            }

            return $product_price;
        } else {
            return 0;
        }
    }

    // function to get total product price
    public function scopeTotalOrderPrice($query, $customer_id)
    {
        $cart_items = $query->where('user_id', auth()->id())
            ->where('customer_id', $customer_id)->get();

        $product_price = 0;
        foreach ($cart_items as $item) {
            $product_price += $item->product_price;
        }

        return $product_price;
    }
}

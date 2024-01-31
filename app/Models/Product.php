<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductView;


class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    // function to get brands
    public function brands()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function views()
    {
        return $this->hasMany(ProductView::class);
    }

    public function carts()
    {
        return $this->hasMany(ProductCart::class);
    }
}

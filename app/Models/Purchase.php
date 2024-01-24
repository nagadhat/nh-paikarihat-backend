<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $table = 'purchase_orders';
    protected $guarded = [];

    // function to get supplier details
    public function supplier_details()
    {
        return $this->hasOne(Supplier::class, 'id', 'supplier_id');
    }

    // function to get purchase payment details
    public function purchase_payments()
    {
        return $this->hasOne(PurchaseOrderPayment::class, 'purchase_order_id', 'id');
    }
}

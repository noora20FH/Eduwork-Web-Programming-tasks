<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'customer_name',
        'customer_phone',
        'customer_address',
        'subtotal_amount',
        'shipping_fee',
        'payment_method',
        'total_payment',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function product()
    {
        return $this->belongsToMany(Product::class, 'order_product', 'order_id', 'product_id');
    }
}

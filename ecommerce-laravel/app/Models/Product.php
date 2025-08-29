<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'group',
        'category_id',
        'price',
        'stock',
        'image',
        'description'
    ];
    /**
     * Dapatkan pesanan (order) yang memiliki item pesanan ini.
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}

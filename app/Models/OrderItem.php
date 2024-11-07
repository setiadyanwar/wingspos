<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable =[
        'order_id',
        'product_id',
        'category_name',
        'note',
        'quantity',
        'unit_amount',
        'total_amount'
    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    protected static function boot()
{
    parent::boot();

    static::saved(function ($orderItem) {
        $orderItem->order->updateTotal(); 
    });

    static::deleted(function ($orderItem) {
        $orderItem->order->updateTotal(); 
    });
}

protected static function booted()
{
    static::saved(function ($orderItem) {
        // Ambil `category_id` dari produk di `OrderItem` dan perbarui di `Order`
        $category_id = $orderItem->product?->category_id;
        if ($category_id) {
            $orderItem->order->update(['category_id' => $category_id]);
        }
    });
}

}

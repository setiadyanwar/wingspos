<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'order_date',
        'note',
        'payment_method',
        'invoice',
        'status',
        'payment_status',
        'total',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function updateTotal()
    {
        // Hitung total dari semua item terkait
        $this->total = $this->items->sum('total_amount');
        $this->saveQuietly();
    }

    protected static function boot()
    {
    parent::boot();

    static::saved(function ($order) {
        $order->updateTotal();
    });
    }

    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class POS extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dari default ('pos')
    protected $table = 'orders';

    // Definisikan kolom yang bisa diisi
    protected $fillable = [
        'customer_name',
        'total_price',
        'payment_method',
        'status',
        'order_date',
        'payment_status',
    ];

}

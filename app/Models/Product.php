<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    protected $fillable = [
        'nama_produk',
        'harga_produk',
        'jumlah_stok',
        'deskripsi_produk',
        'gambar_produk',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}

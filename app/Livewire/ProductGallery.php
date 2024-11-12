<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductGallery extends Component
{
    public $search = ''; // Variabel untuk pencarian
    public $products = []; // Variabel untuk menyimpan daftar produk

    public function mount()
    {
        $this->loadProducts(); // Memuat produk saat komponen di-mount
    }

    public function loadProducts()
    {
        $this->products = Product::where('nama_produk', 'like', '%' . $this->search . '%')->get();
    }

    public function updatedSearch()
    {
        $this->loadProducts(); // Update produk setiap kali pencarian berubah
    }

    public function addProductToCart($productId)
    {
        // Tambahkan logika untuk menambahkan produk ke keranjang di sini
    }

    public function render()
    {
        return view('livewire.product-gallery');
    }
}

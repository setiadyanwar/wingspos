<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\POS;
use App\Models\Order;

class POSPage extends Page
{
    protected static ?string $navigationLabel = 'POS';
    protected static ?string $navigationIcon = 'heroicon-o-document-currency-rupee';
    protected static ?string $slug = 'pos';
    protected static string $view = 'filament.pages.pos-page';

    public $products;         // Menyimpan data produk
    public $cart = [];        // Menyimpan produk yang dipilih
    public $cartQuantities = []; // Menyimpan jumlah produk per ID
    public $totalPrice = 0;
    public $totalItems = 0;

    public function mount()
    {
        // Mengambil data produk dari database
        $this->products = POS::all(); // Sesuaikan query sesuai kebutuhan Anda
    }

    // Menambahkan produk ke keranjang
    public function addToCart($productId)
    {
        $product = POS::find($productId);

        if ($product) {
            $this->cart[$productId] = $product;
            $this->cartQuantities[$productId] = ($this->cartQuantities[$productId] ?? 0) + 1;
            $this->calculateTotals();
        }
    }

    // Memperbarui jumlah produk dalam keranjang
    public function updateCart($productId, $increase)
    {
        if (isset($this->cartQuantities[$productId])) {
            if ($increase) {
                $this->cartQuantities[$productId]++;
            } else {
                $this->cartQuantities[$productId] = max(0, $this->cartQuantities[$productId] - 1);
                if ($this->cartQuantities[$productId] === 0) {
                    unset($this->cart[$productId]); // Hapus produk dari keranjang jika jumlahnya 0
                }
            }
            $this->calculateTotals();
        }
    }

    // Menghitung total harga dan total item
    public function calculateTotals()
    {
        $this->totalPrice = 0;
        $this->totalItems = 0;
    
        foreach ($this->cart as $productId => $item) {
            $quantity = $this->cartQuantities[$productId] ?? 0;
            $this->totalPrice += $item['harga_produk'] * $quantity;
            $this->totalItems += $quantity;
        }
        dd($this->totalPrice, $this->totalItems);
    }
    

    // Fungsi untuk checkout dan menyimpan pesanan ke database
    public function submitOrder()
    {
        $this->calculateTotals(); // Pastikan nilai total diperbarui sebelum penyimpanan

        Order::create([
            'total_price' => $this->totalPrice,
            'total_items' => $this->totalItems,
            // tambahkan field lain jika perlu
        ]);

        // Reset keranjang setelah checkout
        $this->resetCart();
    }


    // Mengosongkan keranjang setelah checkout
    public function resetCart()
    {
        $this->cart = [];
        $this->cartQuantities = [];
        $this->totalPrice = 0;
        $this->totalItems = 0;
    }

}

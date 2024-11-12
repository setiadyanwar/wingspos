<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class POSComponent extends Component
{
    use WithPagination;

    public $search = '';
    public $products = [];
    public $totalPrice = 0;
    public $totalItems = 0;
    public $cart = [];
    public $cartQuantities = [];
    public $selectedProduct = null;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->loadProducts();
    }

    public function loadProducts()
    {
        $paginatedProducts = Product::where('nama_produk', 'like', '%' . $this->search . '%')->paginate(12);
        $this->products = $paginatedProducts->items();

        return view('livewire.p-o-s-component', [
            'pagination' => $paginatedProducts
        ]);
    }

    public function selectProduct($productId)
    {
        $this->addToCart($productId);  // Tambahkan produk ke keranjang saat dipilih
    }

    public function addToCart($productId)
    {
        $product = Product::find($productId);

        if ($product) {
            if (isset($this->cart[$productId])) {
                $this->cartQuantities[$productId]++;
            } else {
                $this->cart[$productId] = $product;
                $this->cartQuantities[$productId] = 1;
            }

            $this->totalPrice += $product->harga_produk;
        }
    }

    public function updateCart($productId, $increase = true)
    {
        if (isset($this->cartQuantities[$productId])) {
            if ($increase) {
                $this->cartQuantities[$productId]++;
                $this->totalPrice += $this->cart[$productId]->harga_produk;
            } else {
                $this->cartQuantities[$productId]--;

                if ($this->cartQuantities[$productId] <= 0) {
                    // Hapus produk dari keranjang jika jumlahnya menjadi 0
                    unset($this->cart[$productId]);
                    unset($this->cartQuantities[$productId]);
                } else {
                    $this->totalPrice -= $this->cart[$productId]->harga_produk;
                }
            }
        }

        // Set totalPrice menjadi 0 jika keranjang kosong
        if (empty($this->cart)) {
            $this->totalPrice = 0;
        }
    }

    public function render()
    {
        return $this->loadProducts();
    }
}

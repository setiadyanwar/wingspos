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
        $this->selectedProduct = Product::find($productId);
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

    public function increaseQuantity($productId)
    {
        if (isset($this->cartQuantities[$productId])) {
            $this->cartQuantities[$productId]++;
            $this->totalPrice += $this->cart[$productId]->harga_produk;
        }
    }

    public function decreaseQuantity($productId)
    {
        if (isset($this->cartQuantities[$productId]) && $this->cartQuantities[$productId] > 1) {
            $this->cartQuantities[$productId]--;
            $this->totalPrice -= $this->cart[$productId]->harga_produk;
        } elseif (isset($this->cartQuantities[$productId]) && $this->cartQuantities[$productId] == 1) {
            // Remove product from cart if quantity is 1 and decrease total price
            $this->totalPrice -= $this->cart[$productId]->harga_produk;
            unset($this->cart[$productId]);
            unset($this->cartQuantities[$productId]);
        }
    }

    public function render()
    {
        return $this->loadProducts();
    }
}

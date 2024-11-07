<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class POSComponent extends Component
{
    public function render()
    {
        $products = Product::paginate(12);
        return view('livewire.p-o-s-component', [
            'products' => $products,
        ]);
    }
}

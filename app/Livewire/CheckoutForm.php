<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class CheckoutForm extends Component
{
    public $customerName;
    public $totalPrice; // Menyimpan total harga dari POSComponent
    public $paymentMethod = 'cash';
    public $showQR = false;

    protected $rules = [
        'customerName' => 'required|string|max:255',
        'paymentMethod' => 'required|in:cash,qris',
    ];

    public function updatedPaymentMethod($value)
    {
        $this->showQR = $value === 'qris';
    }

    public function checkout()
    {
        $this->validate();

        DB::transaction(function () {
            $order = Order::create([
                'name' => $this->customerName,
                'total' => $this->totalPrice, // Menggunakan totalPrice yang diterima dari POSComponent
                'payment_method' => $this->paymentMethod,
                'payment_status' => $this->paymentMethod === 'cash' ? 'completed' : 'processing',
                'status' => 'processing',
                'order_date' => now(),
                'invoice' => 'INV-' . strtoupper(uniqid()), // Menambahkan nilai untuk kolom invoice
            ]);

            if ($this->paymentMethod === 'cash') {
                $this->redirect(route('filament.admin.pages.pos'));
            } else {
                $this->showQR = true;
            }
        });
    }

    public function completePayment()
    {
        $order = Order::latest()->first();
        $order->update(['payment_status' => 'completed']);
        
        $this->redirect(route('filament.admin.pages.pos'));
    }

    public function render()
    {
        return view('livewire.checkout-form');
    }
}

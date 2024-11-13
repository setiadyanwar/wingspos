<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class CheckoutForm extends Component
{
    public $customerName;
    public $totalPrice = 0; // Inisialisasi total harga
    public $totalItems = 0; // Inisialisasi total item
    public $paymentMethod = 'cash';
    public $showQR = false;
    public $cart = []; // Menyimpan data cart
    public $cartQuantities = []; // Menyimpan jumlah produk per ID

    protected $rules = [
        'customerName' => 'required|string|max:255',
        'paymentMethod' => 'required|in:cash,qris',
    ];

    protected $listeners = ['sendCheckoutData' => 'receiveCheckoutData'];

    public function receiveCheckoutData($totalPrice, $cart, $cartQuantities)
    {
        $this->totalPrice = $totalPrice;
        $this->cart = $cart;
        $this->cartQuantities = $cartQuantities;
        $this->calculateTotals(); // Hitung ulang total jika diperlukan
    }

    public function mount($totalPrice, $cart, $cartQuantities)
    {
        $this->totalPrice = $totalPrice;
        $this->cart = $cart;
        $this->cartQuantities = $cartQuantities;
    }

    public function updatedPaymentMethod($value)
    {
        $this->showQR = $value === 'qris';
    }

    public function calculateTotals()
    {
        $this->totalPrice = 0;
        $this->totalItems = 0;

        foreach ($this->cart as $productId => $item) {
            $quantity = $this->cartQuantities[$productId] ?? 0;
            $this->totalPrice += $item['harga_produk'] * $quantity;
            $this->totalItems += $quantity;
        }
    }

    public function checkout()
    {
        $this->validate();

        DB::transaction(function () {
            // Buat pesanan baru
            $order = Order::create([
                'name' => $this->customerName,
                'total' => $this->totalPrice,
                'payment_method' => $this->paymentMethod,
                'payment_status' => $this->paymentMethod === 'cash' ? 'completed' : 'processing',
                'status' => 'processing',
                'order_date' => now(),
                'invoice' => 'INV-' . strtoupper(uniqid()),
            ]);

            // Simpan setiap item dalam pesanan ke tabel OrderItem
            foreach ($this->cart as $productId => $item) {
                $order->items()->create([
                    'product_id' => $productId,
                    'quantity' => $this->cartQuantities[$productId] ?? 1,
                    'unit_amount' => $item['harga_produk'],
                    'total_amount' => $item['harga_produk'] * ($this->cartQuantities[$productId] ?? 1),
                    'category_name' => $item['category_name'] ?? null,
                ]);
            }
        });

        // Simpan data checkout ke dalam session untuk referensi
        session()->put('checkout_data', [
            'totalPrice' => $this->totalPrice,
            'cart' => $this->cart,
            'cartQuantities' => $this->cartQuantities,
        ]);

        // Cek metode pembayaran dan tentukan tindakan berikutnya
        if ($this->paymentMethod === 'cash') {
            // Jika cash, redirect ke halaman POS atau selesai
            $this->redirect(route('filament.admin.pages.pos'));
        } else {
            // Jika QRIS, tampilkan QR code
            $this->showQR = true;
        }
    }

    public function completePayment()
    {
        // Ambil order terbaru dan update status pembayaran menjadi completed
        $order = Order::latest()->first();
        if ($order) {
            $order->update(['payment_status' => 'completed']);
        }

        // Redirect ke halaman POS
        $this->redirect(route('filament.admin.pages.pos'));
    }

    public function render()
    {
        return view('livewire.checkout-form');
    }
}

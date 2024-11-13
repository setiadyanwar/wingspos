<div class="bg-gray-700 rounded-lg p-6 relative">
    <h2 class="text-black dark:text-white text-xl font-bold mb-6 text-center">Form Checkout</h2>

    <!-- Pop-up QR Code -->
    @if ($showQR)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
            <div class="bg-white rounded-lg p-4 max-w-sm w-full text-center">
                <p class="text-gray-700 mb-2">Scan QR Code untuk menyelesaikan pembayaran:</p>
                <img src="{{ asset('img/qr.png') }}" alt="QR Code" class="mx-auto my-4" style="width: 150px;">
                <button 
                    type="button" 
                    wire:click="completePayment" 
                    class="w-full px-4 py-2 bg-amber-600 text-black rounded-md hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-500"
                >
                    Selesai
                </button>
            </div>
        </div>
    @endif

    <!-- Form Checkout -->
    <form wire:submit.prevent="checkout">
        <!-- Input Nama Customer -->
        <div class="mb-4">
            <label for="customerName" class="block text-sm font-medium text-gray-300">Nama Customer</label>
            <input 
                wire:model="customerName" 
                type="text" 
                id="customerName" 
                class="mt-1 block w-full rounded-md bg-gray-100 text-black border-gray-300 dark:bg-gray-800 dark:text-white dark:border-gray-600 focus:border-amber-500 focus:ring-amber-500" 
                required
            >
            @error('customerName') 
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span> 
            @enderror
        </div>

        <!-- Pilihan Metode Pembayaran -->
        <div class="mb-4">
            <label for="paymentMethod" class="block text-sm font-medium text-black">Metode Pembayaran</label>
            <select 
                wire:model="paymentMethod" 
                id="paymentMethod" 
                class="mt-1 block w-full rounded-md bg-gray-100 text-black border-gray-300 dark:bg-gray-800 dark:text-white dark:border-gray-600 focus:border-amber-500 focus:ring-amber-500"
            >
                <option value="cash">Cash</option>
                <option value="qris">QRIS</option>
            </select>
        </div>

        <!-- Button Checkout -->
        <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Checkout
        </button>
    </form>
</div>

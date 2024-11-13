<div class="container mx-auto p-4">
    <div class="flex flex-col lg:flex-row lg:space-x-4">
        <!-- Left Side: Product Gallery -->
        <div class="lg:w-3/4 p-2">
            <!-- Search Bar -->
            <div class="mb-4">
                <input 
                    wire:model.debounce.300ms="search" 
                    type="text" 
                    placeholder="Cari produk..." 
                    class="p-2 border rounded-xl w-full dark:bg-gray-700 dark:text-white" />
            </div>

            <!-- Product Gallery -->
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                @foreach($products as $product)
                    <div wire:click="selectProduct({{ $product->id }})" class="p-4 bg-gray-100 dark:bg-gray-800 rounded cursor-pointer">
                        <img 
                            src="{{ asset('storage/' . $product['gambar_produk']) }}" 
                            alt="Product Image" 
                            class="w-full h-32 rounded-lg object-cover mb-2" />
                        <h3 class="text-lg font-bold text-black dark:text-white">{{ $product['nama_produk'] }}</h3>
                        <p class="text-black dark:text-white">Rp {{ number_format($product['harga_produk'], 0, ',', '.') }}</p>
                        <p class="text-black dark:text-white">Stok: {{ $product['jumlah_stok'] }}</p>
                        <button 
                            wire:click="addToCart({{ $product->id }})" 
                            class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">
                            Tambah ke Keranjang
                        </button>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Right Side: Cart -->
        <div class="lg:w-1/4 lg:min-w-[250px] lg:flex-shrink-0 bg-gray-100 dark:bg-gray-800 shadow-md rounded-lg p-6">
            <h2 class="text-xl font-bold mb-2 text-black dark:text-white">Keranjang Belanja</h2>
            <ul class="mb-4 text-black dark:text-white">
                @foreach($cart as $productId => $item)
                    <li class="flex items-center justify-between mb-2">
                        <!-- Product Image (Smaller) -->
                        <img 
                            src="{{ asset('storage/' . $item['gambar_produk']) }}" 
                            alt="Product Image" 
                            class="w-10 h-10 rounded-lg object-cover mr-2" />
                        
                        <!-- Product Details (Smaller Text) -->
                        <div class="flex flex-col flex-grow text-sm">
                            <span class="font-semibold">{{ $item['nama_produk'] }}</span>
                            <span>Rp {{ number_format($item['harga_produk'], 0, ',', '.') }}</span>
                        </div>
                        
                        <!-- Quantity Controls with Yellow and Green Buttons -->
                        <div class="flex items-center">
                            <button 
                                wire:click="updateCart({{ $productId }}, false)" 
                                class="px-2 bg-yellow-500 text-black dark:text-white rounded">
                                -
                            </button>
                            <span class="px-2 text-sm">{{ $cartQuantities[$productId] ?? 0 }}</span>
                            <button 
                                wire:click="updateCart({{ $productId }}, true)" 
                                class="px-2 bg-green-500 text-black dark:text-white rounded">
                                +
                            </button>
                        </div>
                    </li>
                @endforeach
            </ul>
            <hr class="my-2">
            
            <!-- Display Total Price if it's greater than zero -->
            @if ($totalPrice > 0)
                <p class="text-lg font-bold text-black dark:text-white">Total Harga: Rp {{ number_format($totalPrice, 0, ',', '.') }}</p>
            @endif

            <!-- Memanggil CheckoutForm dan mengirimkan totalPrice -->
            @livewire('checkout-form', [
                'totalPrice' => $this->totalPrice,
                'cart' => $this->cart,
                'cartQuantities' => $this->cartQuantities
            ])
        </div>
    </div>
</div>

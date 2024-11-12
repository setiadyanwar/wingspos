<div class="container mx-auto p-4">
    <div class="flex flex-col lg:flex-row lg:space-x-4">
        <!-- Left Side: Product Gallery -->
        <div class="lg:w-3/4 p-2">
            <!-- Search Bar -->
            <div class="mb-4">
                <input wire:model.debounce.300ms="search" type="text" placeholder="Cari produk..." class="p-2 border rounded-xl w-full dark:bg-gray-700 dark:text-white" />
            </div>

            <!-- Product Gallery -->
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                @foreach($products as $product)
                    <div wire:click="selectProduct({{ $product->id }})" class="p-4 bg-gray-100 dark:bg-gray-800 rounded cursor-pointer">
                        <img src="{{ asset('storage/' . $product['gambar_produk']) }}" alt="Product Image" class="w-full h-32 rounded-lg object-cover mb-2" />
                        <h3 class="text-lg font-bold text-black dark:text-white">{{ $product['nama_produk'] }}</h3>
                        <p class="text-black dark:text-white">Rp {{ number_format($product['harga_produk'], 0, ',', '.') }}</p>
                        <p class="text-black dark:text-white">Stok: {{ $product['jumlah_stok'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Right Side: Cart -->
        <div class="lg:w-1/4 lg:min-w-[250px] lg:flex-shrink-0 bg-gray-100 dark:bg-gray-800 shadow-md rounded-lg p-6">
            <h2 class="text-xl font-bold mb-2 text-black dark:text-white">Keranjang Belanja</h2>
            <ul class="mb-4 text-black dark:text-white">
                @foreach($cart as $item)
                    <li class="flex justify-between">
                        <span>{{ $item['nama_produk'] }}</span>
                        <span>
                            <button wire:click="updateCart({{ $item->id }}, false)" class="px-2 bg-red-500 text-white rounded">-</button>
                            {{ $cartQuantities[$item->id] ?? 0 }}
                            <button wire:click="updateCart({{ $item->id }}, true)" class="px-2 bg-green-500 text-white rounded">+</button>
                        </span>
                        <span>Rp {{ number_format($item['harga_produk'] * $cartQuantities[$item->id], 0, ',', '.') }}</span>
                    </li>
                @endforeach
            </ul>
            <hr class="my-2">
            @if ($totalPrice > 0)
                <p class="text-lg font-bold text-black dark:text-white">Total Harga: Rp {{ number_format($totalPrice, 0, ',', '.') }}</p>
            @endif

            <!-- Memanggil CheckoutForm dan mengirimkan totalPrice -->
            @livewire('checkout-form', ['totalPrice' => $totalPrice])
        </div>
    </div>
</div>

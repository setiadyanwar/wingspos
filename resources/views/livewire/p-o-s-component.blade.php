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

        <!-- Right Side: Selected Product & Cart -->
        <div class=" lg:w-1/4 lg:min-w-[250px] lg:flex-shrink-0 bg-gray-100 dark:bg-gray-800 shadow-md rounded-lg p-6">
            <h2 class="text-xl font-bold mb-2 text-black dark:text-white">Detail Produk</h2>
            @if ($selectedProduct)
                <div class="text-center">
                    <img src="{{ asset('storage/' . $product['gambar_produk']) }}" alt="Selected Product" class="w-32 h-32 object-cover mb-2" />
                    <h3 class="text-lg font-bold text-black dark:text-white">{{ $selectedProduct->nama_produk }}</h3>
                    <p class="text-black dark:text-white">Harga: Rp {{ number_format($selectedProduct->harga_produk, 0, ',', '.') }}</p>

                    <!-- Add to Cart Controls -->
                    <div class="flex items-center justify-center mt-4">
                        <button wire:click="updateCart({{ $selectedProduct->id }}, false)" class="px-4 py-2 bg-red-500 text-white rounded">-</button>
                        <span class="mx-4 text-black dark:text-white">{{ collect($cart)->where('id', $selectedProduct->id)->first()['quantity'] ?? 0 }}</span>
                        <button wire:click="updateCart({{ $selectedProduct->id }}, true)" class="px-4 py-2 bg-green-500 text-white rounded">+</button>
                    </div>
                </div>
            @else
                <p class="text-black dark:text-white">Pilih produk dari galeri untuk melihat detail.</p>
            @endif

            <!-- Cart Summary -->
            <h2 class="text-xl font-bold mt-6 mb-2 text-black dark:text-white">Keranjang Belanja</h2>
            <ul class="mb-4 text-black dark:text-white">
                @foreach($cart as $item)
                    <li class="flex justify-between">
                        <span>{{ $item['nama_produk'] }}</span>
                        <span>{{ $item['quantity'] }} x Rp {{ number_format($item['harga_produk'], 0, ',', '.') }}</span>
                    </li>
                @endforeach
            </ul>
            <hr class="my-2">
            <p class="text-lg font-bold text-black dark:text-white">Total Harga: Rp {{ number_format($totalPrice, 0, ',', '.') }}</p>
        </div>
    </div>
</div>

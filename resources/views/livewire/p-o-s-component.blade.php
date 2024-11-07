<div class="grid grid-cols-3 gap-4">
    <!-- Kolom Kiri: Galeri Produk -->
    <div class="col-span-2">
        <!-- Pencarian Produk -->
        <div class="mb-4">
            <input type="text" placeholder="Cari produk..." class="w-full p-2 rounded-lg bg-gray-800 text-white placeholder-gray-500" />
        </div>

        <!-- Grid Produk -->
        <div class="grid grid-cols-3 gap-4">
            @foreach ($products as $product)
                <x-filament::card>
                    <img src="{{ Storage::url('products-images/' . $product->image_url) }}" alt="{{ $product->name }}" class="w-full h-32 object-cover mb-2 rounded" />
                    <h3 class="text-white font-semibold">{{ $product->name }}</h3>
                    <p class="text-gray-400">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <p class="text-gray-400">Stok: {{ $product->stock }}</p>
                </x-filament::card>
            @endforeach
        </div>

        <!-- Pagination atau tambahan lainnya jika diperlukan -->
        <div class="mt-4">
            {{ $products->links() }}
        </div>
    </div>

    <!-- Kolom Kanan: Form Checkout -->
    <div class="col-span-1 bg-gray-900 p-4 rounded-lg shadow-md">
        <!-- Total Pembayaran -->
        <div class="mb-4">
            <h2 class="text-lg font-semibold text-white">Total: Rp 5.600</h2>
            <div class="flex items-center mt-2">
                <img src="{{ Storage::url('products-images/indomie-goreng.png') }}" alt="Indomie Goreng" class="w-12 h-12 object-cover rounded mr-2" />
                <div class="text-white">
                    <p>Indomie Goreng</p>
                    <div class="flex items-center space-x-2">
                        <button class="bg-yellow-500 px-2 rounded text-white">-</button>
                        <span>2</span>
                        <button class="bg-green-500 px-2 rounded text-white">+</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Checkout -->
        <h2 class="text-lg font-semibold text-white mb-4">Form Checkout</h2>
        <form wire:submit.prevent="checkout">
            <div class="mb-4">
                <label class="text-gray-400">Name Customer*</label>
                <input type="text" class="w-full bg-gray-800 text-white p-2 rounded" placeholder="Nama customer" />
            </div>
            
            <div class="mb-4">
                <label class="text-gray-400">Gender*</label>
                <select class="w-full bg-gray-800 text-white p-2 rounded">
                    <option value="">Select an option</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            
            <div class="mb-4">
                <label class="text-gray-400">Total Price</label>
                <input type="text" class="w-full bg-gray-800 text-white p-2 rounded" placeholder="Total price" value="5600" />
            </div>
            
            <div class="mb-4">
                <label class="text-gray-400">Metode Pembayaran*</label>
                <select class="w-full bg-gray-800 text-white p-2 rounded">
                    <option value="">Select an option</option>
                    <option value="cash">Cash</option>
                    <option value="credit">Credit Card</option>
                </select>
            </div>

            <button type="submit" class="w-full bg-red-500 text-white py-2 rounded mt-4">Checkout</button>
        </form>
    </div>
</div>

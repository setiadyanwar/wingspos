<div class="grid grid-cols-3 gap-4">
    <!-- Pencarian Produk -->
    <div class="mb-4 col-span-3">
        <input type="text" wire:model="search" placeholder="Cari produk..." class="w-full p-2 rounded-lg bg-gray-800 text-white placeholder-gray-500" />
    </div>

    <!-- List Produk -->
    @foreach ($products as $product)
        <x-filament::card class="cursor-pointer" wire:click="addProductToCart({{ $product->id }})">
            <img src="{{ Storage::url('products-images/' . $product->image_url) }}" alt="{{ $product->nama_produk }}" class="w-full h-32 object-cover mb-2 rounded" />
            <h3 class="text-white font-semibold">{{ $product->nama_produk }}</h3>
            <p class="text-gray-400">Rp {{ number_format($product->harga_produk, 0, ',', '.') }}</p>
            <p class="text-gray-400">Stok: {{ $product->jumlah_stok }}</p>
        </x-filament::card>
    @endforeach
</div>

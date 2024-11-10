<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\POS;

class POSPage extends Page
{
    protected static ?string $navigationLabel = 'POS';
    protected static ?string $navigationIcon = 'heroicon-o-document-currency-rupee';
    protected static ?string $slug = 'pos';
    protected static string $view = 'filament.pages.pos-page';

    public $products;

    public function mount()
    {
        // Mengambil data produk dari database
        $this->products = POS::all(); // Sesuaikan query sesuai kebutuhan Anda
    }
}

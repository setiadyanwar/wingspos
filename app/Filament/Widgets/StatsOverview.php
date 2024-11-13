<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $startDate = ! is_null($this->filters['startDate'] ?? null) ?
            Carbon::parse($this->filters['startDate']) :
            null;

        $endDate = ! is_null($this->filters['endDate'] ?? null) ?
            Carbon::parse($this->filters['endDate']) :
            now();

        // Menghitung total omset dari semua order
        $totalOmset = Order::sum('total'); 

        // Menghitung total produk terjual dari semua order item
        $totalProdukterjual = OrderItem::sum('quantity');

        // Menghitung total order yang sudah dibuat
        $totalOrder = Order::count(); 

        return [
            Stat::make('Omset', 'Rp. ' . number_format($totalOmset, 0, ',', '.'))
                ->description('Total revenue')
                ->descriptionIcon('heroicon-o-arrow-trending-up', IconPosition::Before)
                ->chart([100, 200, 300, 500, 650, $totalOmset]) 
                ->color('success'),

            Stat::make('Produk Terjual', $totalProdukterjual)
                ->description('Total products ordered')
                ->descriptionIcon('heroicon-o-cube', IconPosition::Before)
                ->chart([5, 10, 20, 30, 35, $totalProdukterjual]) 
                ->color('primary'),

            Stat::make('Total Order', $totalOrder)
                ->description('Total orders made')
                ->descriptionIcon('heroicon-o-shopping-cart', IconPosition::Before)
                ->chart([10, 15, 25, 40, 50, $totalOrder]) 
                ->color('success'),
        ];
    }
}

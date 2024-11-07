<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use App\Models\Order;
use Faker\Core\Number;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class OrderStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Orders', Order::query()
            ->where('status', 'Completed')
            ->where('payment_status', 'Completed')
            ->count()),
            Stat::make('Processing', Order::query()
            ->where('status', 'Processing')
            ->count()),
            Stat::make('Avg Price', 'Rp' . number_format(Order::query()
            ->avg('total'), 0, ',', '.'))
        ];
    }
}

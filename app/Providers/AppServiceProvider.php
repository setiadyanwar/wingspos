<?php

namespace App\Providers;

use Livewire\Livewire;
use App\Livewire\CheckoutForm;
use Filament\Navigation\NavigationGroup;
use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Livewire::component('checkout-form', CheckoutForm::class);
    }
}

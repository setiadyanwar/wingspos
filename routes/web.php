<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('direct');
});

Route::get('/produk', function () {
    return view('produk');
});

Route::get('/checkout', function () {
    return view('checkout');
});

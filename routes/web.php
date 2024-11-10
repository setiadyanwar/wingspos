<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/produk', function () {
    return view('produk');
});

Route::get('/checkout', function () {
    return view('checkout');
});

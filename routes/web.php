<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', \App\Http\Livewire\StoreFront::class)->name('home');
Route::get('/product/{productId}', \App\Http\Livewire\Product::class)->name('product');
Route::get('/cart', \App\Http\Livewire\Cart::class)->name('cart');
Route::get('/checkout-status', \App\Http\Livewire\CheckoutStatus::class)->name('checkout-status');
Route::get('/preview', function() {
    $order = \App\Models\Order::first();

    return new \App\Mail\OrderConfirmation($order);
});

//Route::middleware([
//    'auth:sanctum',
//    config('jetstream.auth_session'),
//    'verified'
//])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
//});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');

Route::get('/transactions/history', [TransactionController::class, 'history'])->name('transactions.history');

Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');

Route::post('/transactions/store', [TransactionController::class, 'store'])->name('transactions.store');

Route::get('/transactions/{id}', [TransactionController::class, 'show'])->name('transactions.detail');

Route::get('/transactions/{id}/edit', [TransactionController::class, 'edit'])->name('transactions.edit');

Route::put('/transactions/{id}', [TransactionController::class, 'update'])->name('transactions.update');

Route::delete('/transactions/{id}', [TransactionController::class, 'destroy'])->name('transactions.destroy');

Route::get('/transactions/{id}/invoice', [TransactionController::class, 'invoice'])->name('transactions.invoice');

// Route produk
Route::resource('products', ProductController::class);
Route::post('/products/{product}/add-to-cart', [ProductController::class, 'addToCart'])->name('products.addToCart');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// Route cart Keranjang
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

// Route Pembayaran
Route::get('/cart', [PaymentController::class, 'index'])->name('cart.index');
Route::get('/cart/payment', [PaymentController::class, 'payment'])->name('cart.payment');
Route::post('/cart/payment/process', [PaymentController::class, 'processPayment'])->name('cart.payment.process');
Route::get('/cart/payment/success', [PaymentController::class, 'success'])->name('cart.payment.success');
Route::get('/cart/payment/failed', [PaymentController::class, 'failed'])->name('cart.payment.failed');

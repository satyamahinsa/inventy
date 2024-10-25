<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

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


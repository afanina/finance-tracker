<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Transaction routes with authentication middleware
Route::middleware(['auth'])->group(function () {
    Route::resource('transactions', TransactionController::class);
});

// Redirect authenticated users to transactions
Route::middleware(['auth'])->group(function () {
    Route::redirect('/home', '/transactions');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('transactions', TransactionController::class);
    Route::get('/transactions-export', [TransactionController::class, 'export'])->name('transactions.export');
});
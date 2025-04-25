<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CashierController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index']);
});

Route::middleware(['auth', 'role:Cashier'])->group(function () {
    Route::get('/cashier/pos', [CashierController::class, 'index']);
});
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('units', UnitController::class);
});
Route::middleware(['auth'])->group(function () {
    Route::get('/inventory/logs', [InventoryLogController::class, 'index'])->name('inventory.logs');
    Route::get('/inventory/stock-in/{product}', [InventoryLogController::class, 'stockInForm'])->name('inventory.stockin.form');
    Route::post('/inventory/stock-in/{product}', [InventoryLogController::class, 'stockIn'])->name('inventory.stockin');

    // Later we’ll do stock-out as well
});

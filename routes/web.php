<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LandingPageController;

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


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->prefix('SheraWebPanel')->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/sms-balance', [DashboardController::class, 'smsBalance'])->name('sms-balance');

    // Product
    Route::get('/products', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');

    // Order
    Route::get('/orders', [OrderController::class, 'index'])->name('order.index');
    Route::get('/order/{id}', [OrderController::class, 'show'])->name('order.show');
    Route::get('/order/{id}/mark-as-processing', [OrderController::class, 'markAsProcessing'])->name('order.mark-as-processing');
    Route::get('/order/{id}/mark-as-delivered', [OrderController::class, 'markAsDelivered'])->name('order.mark-as-delivered');
    Route::get('/order/{id}/mark-as-canceled', [OrderController::class, 'markAsCanceled'])->name('order.mark-as-canceled');
});



// Frontend

// Route::middleware(['language'])->group(function () {
//     Route::get('/', [FrontendController::class, 'index']);
//     // Route::get('/product/{slug}', [FrontendController::class, 'product'])->name('product');
//     // Route::get('/category/{slug}', [FrontendController::class, 'category'])->name('category');
//     // Route::post('/checkout/{id}', [FrontendController::class, 'checkout'])->name('checkout');
    Route::post('/place-order', [FrontendController::class, 'placeOrder'])->name('place-order');
// });
// Route::get('/cron-delivered-orders', [OrderController::class, 'cronDeliveredOrders']);
// // Set Locale
// Route::get('/lang/{locale}', [FrontendController::class, 'setLocale'])->name('set-locale');



// Frontend
Route::get('/', [FrontendController::class, 'index']);

// Product Landing Page in a route group with prefix 'products' and controller "LandingPageController"
Route::group(['prefix' => 'products', 'as' => 'landing.'], function () {
    Route::get('/jhilmil-gyanbox', [LandingPageController::class, 'jhilmilGyanbox'])->name('jhilmil-gyanbox');
});
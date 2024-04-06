<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\ProviderController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback']);

Route::get('/dashboard', function () {
    return redirect()->route('products.list');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/perfil', [ProfileController::class, 'show'])->name('profile.show');
    Route::view('/empresa', 'nosotros');
    Route::get('/orders', [OrderController::class, 'listOrdersByUser'])->name('orders.list');

    Route::get('products', [ProductController::class, 'productList'])->name('products.list');
    Route::get('productsDetalle/{product}', [ProductController::class, 'getProductDetails'])->name('product.detail');
    Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
    Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
    Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
    Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
    Route::get('order/form', [OrderController::class, 'create'])->name('order.form');
    Route::post('orders', [OrderController::class, 'store'])->name('order.store');
    Route::post('/order/place', [OrderController::class, 'placeOrder'])->name('order.place');
    Route::get('cart/redirect-to-order-form', [CartController::class, 'redirectToOrderForm'])->name('cart.redirectToOrderForm');
    Route::get('/orders/{orderId}', [OrderController::class, 'show'])->name('order.show');
    Route::get('/orders_detail/{orderId}', [OrderController::class, 'orderDetail'])->name('order.detail');

    Route::get('paypal', [PayPalController::class, 'index'])->name('paypal');
    Route::get('paypal/payment', [PayPalController::class, 'payment'])->name('paypal.payment');
    Route::get('paypal/payment/success', [PayPalController::class, 'paymentSuccess'])->name('paypal.payment.success');
    Route::get('paypal/payment/cancel', [PayPalController::class, 'paymentCancel'])->name('paypal.payment/cancel');
});
require __DIR__.'/auth.php';

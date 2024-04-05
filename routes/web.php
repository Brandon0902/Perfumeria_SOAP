<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShippersController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\CategoriesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group
| which is assigned the "web" middleware group. Enjoy building your API!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas para articulos
    Route::get('/articulos', [ProductController::class, 'index'])->name('products.index');
    Route::get('/articulos/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/articulos',[ProductController::class, 'store'])->name('products.store');
    Route::get('/articulos/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::patch('/articulos/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/articulos/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

    // Rutas para Transportistas
    Route::get('/transportistas', [ShippersController::class, 'index'])->name('shippers.index');
    Route::get('/transportistas/create', [ShippersController::class, 'create'])->name('shippers.create');
    Route::post('/transportistas', [ShippersController::class, 'store'])->name('shippers.store');
    Route::get('/transportistas/{id}/edit', [ShippersController::class, 'edit'])->name('shippers.edit');
    Route::patch('/transportistas/{id}', [ShippersController::class, 'update'])->name('shippers.update');
    Route::delete('/transportista/{id}', [ShippersController::class, 'destroy'])->name('shippers.destroy');

    // Rutas para Categorías
    Route::get('/categorias', [CategoriesController::class, 'index'])->name('categories.index');
    Route::get('/categorias/create', [CategoriesController::class, 'create'])->name('categories.create');
    Route::post('/categorias', [CategoriesController::class, 'store'])->name('categories.store');
    Route::get('/categorias/{id}/edit', [CategoriesController::class, 'edit'])->name('categories.edit');
    Route::patch('/categorias/{id}', [CategoriesController::class, 'update'])->name('categories.update');
    Route::delete('/categorias/{id}', [CategoriesController::class, 'destroy'])->name('categories.destroy');

    // Rutas para Proveedores
    Route::get('/proveedores', [SuppliersController::class, 'index'])->name('suppliers.index');
    Route::get('/proveedores/create', [SuppliersController::class, 'create'])->name('suppliers.create');
    Route::post('/proveedores', [SuppliersController::class, 'store'])->name('suppliers.store');
    Route::get('/proveedores/{id}/edit', [SuppliersController::class, 'edit'])->name('suppliers.edit');
    Route::patch('/proveedores/{id}', [SuppliersController::class, 'update'])->name('suppliers.update');
    Route::get('/proveedores/{id}', [SuppliersController::class, 'show'])->name('suppliers.show');
    Route::delete('/proveedores/{id}', [SuppliersController::class, 'destroy'])->name('suppliers.destroy');
});

require __DIR__.'/auth.php';
 

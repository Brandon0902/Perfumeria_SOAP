<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ShippersController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SuppliersController;
use Illuminate\Support\Facades\Route;

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
    Route::get('/articulos', [ProductsController::class, 'index'])->name('products.index');
    Route::get('/articulos/create', [ProductsController::class, 'create'])->name('products.create');
    Route::post('/articulos',[ProductsController::class, 'store'])->name('products.store');
    Route::get('/articulos/{producto}/edit', [ProductsController::class, 'edit'])->name('products.edit');
    Route::patch('/articulos/{producto}', [ProductsController::class, 'update'])->name('products.update');
    Route::delete('/articulos/{producto}', [ProductsController::class, 'destroy'])->name('products.destroy');

    // Rutas para Marcas
    Route::get('/marcas', [BrandController::class, 'index'])->name('brands.index');
    Route::get('/marcas/create', [BrandController::class, 'create'])->name('brands.create');
    Route::post('/marcas', [BrandController::class, 'store'])->name('brands.store');
    Route::get('/marcas/{brand}/edit', [BrandController::class, 'edit'])->name('brands.edit');
    Route::patch('/marcas/{brand}', [BrandController::class, 'update'])->name('brands.update');
    Route::delete('/marcas/{brand}', [BrandController::class, 'destroy'])->name('brands.destroy');

    // Rutas para Transportistas
    Route::get('/transportistas', [ShippersController::class, 'index'])->name('shippers.index');
    Route::get('/transportistas/create', [ShippersController::class, 'create'])->name('shippers.create');
    Route::post('/transportistas', [ShippersController::class, 'store'])->name('shippers.store');
    Route::get('/transportistas/{transportista}/edit', [ShippersController::class, 'edit'])->name('shippers.edit');
    Route::patch('/transportistas/{transportista}', [ShippersController::class, 'update'])->name('shippers.update');
    Route::delete('/transportista/{transportista}', [ShippersController::class, 'destroy'])->name('shippers.destroy');

    // Rutas para Categorías
    Route::get('/categorias', [CategoriesController::class, 'index'])->name('categories.index');
    Route::get('/categorias/create', [CategoriesController::class, 'create'])->name('categories.create');
    Route::post('/categorias', [CategoriesController::class, 'store'])->name('categories.store');
    Route::get('/categorias/{categoria}/edit', [CategoriesController::class, 'edit'])->name('categories.edit');
    Route::patch('/categorias/{categoria}', [CategoriesController::class, 'update'])->name('categories.update');
    Route::delete('/categorias/{categoria}', [CategoriesController::class, 'destroy'])->name('categories.destroy');

    // Rutas para Proveedores
    Route::get('/proveedores', [SuppliersController::class, 'index'])->name('suppliers.index');
    Route::get('/proveedores/create', [SuppliersController::class, 'create'])->name('suppliers.create');
    Route::post('/proveedores', [SuppliersController::class, 'store'])->name('suppliers.store');
    Route::get('/proveedores/{proveedor}/edit', [SuppliersController::class, 'edit'])->name('suppliers.edit');
    Route::patch('/proveedores/{proveedor}', [SuppliersController::class, 'update'])->name('suppliers.update');
    Route::get('/proveedores/{proveedor}', [SuppliersController::class, 'show'])->name('suppliers.show');
    Route::delete('/proveedores/{proveedor}', [SuppliersController::class, 'destroy'])->name('suppliers.destroy');
});

require __DIR__.'/auth.php';
 

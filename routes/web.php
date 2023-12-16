<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\salesController;
use App\Http\Controllers\productsController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\transactionController;

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

Route::get('/', [dashboardController::class, 'page']);
Route::get('/products', [productsController::class, 'page'])->name('products');
Route::get('/products/add', [productsController::class, 'add']);
Route::post('/products/add', [productsController::class, 'adddb']);

Route::get('/products/{product}/', [productsController::class, 'view']);
Route::get('/products/{product}/edit', [productsController::class, 'edit']);
Route::put('/products/{product}/edit', [productsController::class, 'editdb']);

Route::delete('/products/{product}', [productsController::class, 'delete']);

Route::get('/sales', [salesController::class, 'page'])->name('sales');
Route::get('/sales/new', [salesController::class, 'newSales']);
Route::post('/sales/new', [salesController::class, 'newSalesdb']);

Route::get('/transaction', [transactionController::class, 'page']);

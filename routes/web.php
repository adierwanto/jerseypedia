<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', \App\Http\Livewire\Home::class)->name('home');
Route::get('/products', \App\Http\Livewire\ProductIndex::class)->name('products');
Route::get('/products/liga/{ligaid}', \App\Http\Livewire\ProductLiga::class)->name('products-liga');
Route::get('/products/{id}', \App\Http\Livewire\ProductDetail::class)->name('products-detail');
Route::get('/cart', \App\Http\Livewire\Cart::class)->name('cart');
Route::get('/checkout', \App\Http\Livewire\Checkout::class)->name('checkout');
Route::get('/history', \App\Http\Livewire\History::class)->name('history');
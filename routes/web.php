<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\TransactionsController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/home',function(){
//     return view('app');
// })->name('home');

// Route
// Route::get('{any}', function () {
//     return view('layouts.app');
// })->where('any', '.*');

// Route Products
//Route::get('/products',[ProductsController::class, 'index'])->name('products');

// Products
Route::get('/products',[ProductsController::class, 'index'])->name('products');
Route::get('/products/add',[ProductsController::class, 'AddProducts'])->name('products.add');
Route::post('/products/store',[ProductsController::class, 'StoreProducts'])->name('products.store');
Route::get('/products/update/{id}',[ProductsController::class, 'UpdateProducts']);
Route::post('/products/update/store',[ProductsController::class, 'StoreUpdateProducts'])->name('products.update.store');
Route::get('/products/delete/{id}',[ProductsController::class, 'DeleteProducts']);

// Transaction
Route::get('/transactions',[TransactionsController::class, 'index'])->name('transactions');
Route::get('/transactions/add',[TransactionsController::class, 'AddTrans'])->name('transactions.add');
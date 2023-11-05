<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/posts', 'PostsController@index');
// Route::post('/posts/store', 'PostsController@store');
// Route::get('/posts/{id?}', 'PostsController@show');
// Route::post('/posts/update/{id?}', 'PostsController@update');
// Route::delete('/posts/{id?}', 'PostsController@destroy');

// API Trans
Route::get('/transactions/gettransactions',[TransactionsController::class, 'getTransactions'])->name('transactions.gettransactions');
Route::post('/transactions/store', [TransactionsController::class, 'store'])->name('transactions.store');
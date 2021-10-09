<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\CheckoutController;
use App\Http\Controllers\API\TransactionController;
use App\Http\Controllers\API\OrderController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'auth'
], function() {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::get('logout', [AuthController::class, 'logout']);
});

Route::get('products', [ProductController::class, 'all']);

Route::post('checkout', [CheckoutController::class, 'checkout']);


Route::get('transaction', [TransactionController::class, 'GetTransaction']);
Route::get('transactions/{id}', [TransactionController::class, 'get']);

Route::post('order', [OrderController::class, 'PostOrder']);
Route::get('order', [OrderController::class, 'GetOrder']);
Route::put('order/{id}', [OrderController::class, 'UpdateOrder']);
Route::delete('order-delete/{id}', [OrderController::class, 'DeleteOrder']);

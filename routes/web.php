<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MavkaController;
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

Route::get('/home',   [MavkaController::class, 'index']); 

Route::get('/about', [MavkaController::class, 'about']);

Route::get('/menu/{parameter}', [MavkaController::class, 'menu']);

Route::get('/item/{id}', [MavkaController::class, 'item']);

Route::post('/order_form', [MavkaController::class, 'order_form']);

Route::post('/remove_item/{id}', [MavkaController::class, 'remove_item']);

Route::post('/reduce_item/{id}', [MavkaController::class, 'reduce_item']);

Route::post('/increase_item/{id}', [MavkaController::class, 'increase_item']);

Route::get('/order_table', [MavkaController::class, 'order_table']);

Route::get('/order_delivery', [MavkaController::class, 'order_delivery']);

Route::post('/confirm_order', [MavkaController::class, 'confirm_order']);

Route::get('/cart', [MavkaController::class, 'cart']);

Route::post('/add_cart', [MavkaController::class, 'add_cart']);

Route::get('/delivery', [MavkaController::class, 'delivery']);

Route::get('/special', [MavkaController::class, 'special']);


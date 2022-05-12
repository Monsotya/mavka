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

Route::get('/',   [MavkaController::class, 'index']); 

Route::get('/about', [MavkaController::class, 'about']);

Route::get('/menu', [MavkaController::class, 'menu']);

Route::get('/order', [MavkaController::class, 'order']);


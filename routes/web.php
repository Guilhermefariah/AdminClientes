<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\RelatorioController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ClienteController::class, 'index'])->name('clientes.index');

Route::resource('clientes', ClienteController::class);
Route::get('/relatorios', [RelatorioController::class, 'index'])->name('relatorios.index');
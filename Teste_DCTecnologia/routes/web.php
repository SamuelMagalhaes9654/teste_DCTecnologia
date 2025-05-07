<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->middleware('auth')->name('home');

Route::resource('clientes', ClienteController::class)->middleware('auth');

Route::resource('produtos', ProdutoController::class)->middleware('auth');

Route::resource('vendas', VendaController::class)->middleware('auth');
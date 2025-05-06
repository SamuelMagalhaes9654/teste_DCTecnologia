<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->middleware('auth')->name('home');

Route::get('/vendas', function () {
    return view('home');
})->middleware('auth')->name('vendas');

Route::resource('clientes', ClienteController::class)->middleware('auth');

Route::resource('produtos', ProdutoController::class)->middleware('auth');
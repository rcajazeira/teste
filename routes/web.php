<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rota para a página "Sobre a Empresa"
Route::get('/', function () {
    return view('components.index');
});

// Rota para a página de "Produtos"
Route::get('/produtos', function () {
    return view('components.produto');
});

use App\Http\Controllers\PagesController;

Route::get('/', [PagesController::class, 'aboutUs']);
Route::get('/produtos', [PagesController::class, 'products']);

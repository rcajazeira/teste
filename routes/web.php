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

// Rota para a página "Sobre a Empresa"
Route::get('/', [PagesController::class, 'aboutUs']);

// Rota para a página de "Produtos" (agora busca do BD e tem um nome)
Route::get('/produtos', [PagesController::class, 'products'])->name('products.index');

// Rota para exibir o formulário de criação de produto
Route::get('/produtos/criar', [PagesController::class, 'createProductForm'])->name('products.create');

// Rota para processar a submissão do formulário e salvar o produto
Route::post('/produtos', [PagesController::class, 'storeProduct'])->name('products.store');

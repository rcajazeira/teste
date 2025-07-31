<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

// Rota para a página "Sobre a Empresa"
Route::get('/', [PagesController::class, 'aboutUs']);

// Grupo de rotas para Produtos, com prefixo 'produtos' e nome 'products.'
Route::prefix('produtos')->name('products.')->group(function () {
    // Rota para a página de "Produtos" (agora busca do BD)
    Route::get('/', [PagesController::class, 'products'])->name('index');

    // Rota para exibir o formulário de criação de produto
    Route::get('/criar', [PagesController::class, 'createProductForm'])->name('create');

    // Rota para processar a submissão do formulário e salvar o produto
    Route::post('/', [PagesController::class, 'storeProduct'])->name('store');

    // **NOVAS ROTAS PARA EDITAR E DELETAR**
    
    // Rota para exibir o formulário de edição de um produto específico
    Route::get('/{product}/editar', [PagesController::class, 'editProductForm'])->name('edit');

    // Rota para processar a submissão do formulário de edição e atualizar o produto
    Route::put('/{product}', [PagesController::class, 'updateProduct'])->name('update');

    // Rota para deletar um produto específico
    Route::delete('/{product}', [PagesController::class, 'deleteProduct'])->name('destroy');
});
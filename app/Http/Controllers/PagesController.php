<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class PagesController extends Controller
{
    public function aboutUs()
    {
        return view('components.index');
    }

    public function products()
    {
        $produtos = Product::all();
        return view('components.produto', compact('produtos'));
    }

    public function createProductForm()
    {
        return view('components.create_product');
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'preco' => 'required|numeric|min:0',
        ]);

        Product::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'preco' => $request->preco,
        ]);

        return redirect()->route('products.index')->with('success', 'Produto adicionado com sucesso!');
    }

    // **NOVOS MÉTODOS PARA EDITAR E DELETAR**

    /**
     * Exibe o formulário de edição para um produto específico.
     */
    public function editProductForm(Product $product)
    {
        // O Laravel automaticamente encontra o produto com o ID da URL
        return view('components.edit_product', ['produto' => $product]);
    }

    /**
     * Atualiza um produto específico no banco de dados.
     */
    public function updateProduct(Request $request, Product $product)
    {
        // 1. Validação dos dados do formulário
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'preco' => 'required|numeric|min:0',
        ]);

        // 2. Atualizar os dados do produto no banco de dados
        $product->update([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'preco' => $request->preco,
        ]);

        // 3. Redirecionar de volta para a lista de produtos com uma mensagem de sucesso
        return redirect()->route('products.index')->with('success', 'Produto atualizado com sucesso!');
    }

    /**
     * Deleta um produto específico do banco de dados.
     */
    public function deleteProduct(Product $product)
    {
        $product->delete();

        // Redirecionar para a lista de produtos com uma mensagem de sucesso
        return redirect()->route('products.index')->with('success', 'Produto excluído com sucesso!');
    }
}
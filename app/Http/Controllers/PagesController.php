<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // IMPORTANTE: Importe o Model Product aqui!

class PagesController extends Controller
{
    /**
     * Exibe a página "Sobre a Empresa".
     */
    public function aboutUs()
    {
        return view('components.index');
    }

    /**
     * Exibe a página de "Produtos".
     * Busca os produtos do banco de dados.
     */
    public function products()
    {
        // Buscar TODOS os produtos do banco de dados usando o Model Product
        $produtos = Product::all(); // Product::all() retorna uma coleção de todos os registros da tabela 'products'

        // Retorna a view 'components.produto' e PASSA OS DADOS $produtos para ela
        return view('components.produto', compact('produtos'));
    }

    /**
     * Exibe o formulário para criar um novo produto.
     */
    public function createProductForm()
    {
        // Retorna a view que contém o formulário para adicionar produtos
        return view('components.create_product');
    }

    /**
     * Armazena um novo produto no banco de dados.
     */
    public function storeProduct(Request $request)
    {
        // 1. Validação dos dados do formulário
        $request->validate([
            'nome'      => 'required|string|max:255',
            'descricao' => 'required|string',
            'preco'     => 'required|numeric|min:0',
            // Se você tiver a coluna 'funcao' na sua migration e quiser validá-la:
            // 'funcao'    => 'nullable|string|max:255',
        ]);

        // 2. Criar um novo produto no banco de dados usando o Model Product
        Product::create([
            'nome'      => $request->nome,
            'descricao' => $request->descricao,
            'preco'     => $request->preco,
            // Se tiver 'funcao':
            // 'funcao'    => $request->funcao,
        ]);

        // 3. Redirecionar de volta para a lista de produtos com uma mensagem de sucesso
        return redirect()->route('products.index')->with('success', 'Produto adicionado com sucesso!');
    }
}
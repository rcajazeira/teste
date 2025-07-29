<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Exibe a página "Sobre a Empresa".
     */
    public function aboutUs()
    {
        // O controller decide qual view carregar
        // 'components.index' se refere a resources/views/components/index.blade.php
        return view('components.index');
    }

    /**
     * Exibe a página de "Produtos".
     */
    public function products()
    {
        // Aqui você poderia buscar produtos de um banco de dados (futuro!)
        // Por enquanto, vamos criar alguns dados de exemplo
        $produtos = [
            [
                'nome' => 'Motor Elétrico Industrial de 5HP',
                'descricao' => 'Motor robusto de alta performance, ideal para aplicações industriais.',
                'funcao' => 'Converte energia elétrica em energia mecânica.'
            ],
            [
                'nome' => 'Bomba Hidráulica de Engrenagens',
                'descricao' => 'Bomba compacta e eficiente para sistemas hidráulicos.',
                'funcao' => 'Transfere fluidos para gerar força e movimento.'
            ],
            [
                'nome' => 'Atuador Linear Elétrico',
                'descricao' => 'Dispositivo mecânico que converte movimento rotativo em movimento linear.',
                'funcao' => 'Move, levanta, empurra ou puxa objetos em uma linha reta.'
            ]
        ];

        // Retorna a view 'components.produto' e PASSA OS DADOS $produtos para ela
        // O segundo argumento do 'view()' é um array com os dados
        return view('components.produto', compact('produtos'));
        // compact('produtos') é o mesmo que ['produtos' => $produtos]
    }
}

//teste
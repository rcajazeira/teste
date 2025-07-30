@extends('index') {{-- Usa o layout principal --}}

@section('title', 'Adicionar Novo Produto') {{-- Título específico para esta página --}}

@section('content') {{-- Conteúdo principal da página --}}
    <h1>Adicionar Novo Produto</h1>

    {{-- Exibir mensagens de sucesso (se houver) --}}
    @if (session('success'))
        <div style="background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 10px; margin-bottom: 20px; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif

    {{-- Exibir erros de validação (se houver) --}}
    @if ($errors->any())
        <div style="background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 10px; margin-bottom: 20px; border-radius: 5px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" style="background-color: #f8f9fa; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
        @csrf {{-- OBRIGATÓRIO para formulários POST no Laravel --}}

        <div style="margin-bottom: 15px;">
            <label for="nome" style="display: block; margin-bottom: 5px; font-weight: bold;">Nome do Produto:</label>
            <input type="text" id="nome" name="nome" value="{{ old('nome') }}" required
                   style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="descricao" style="display: block; margin-bottom: 5px; font-weight: bold;">Descrição:</label>
            <textarea id="descricao" name="descricao" rows="5" required
                      style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;">{{ old('descricao') }}</textarea>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="preco" style="display: block; margin-bottom: 5px; font-weight: bold;">Preço:</label>
            <input type="number" id="preco" name="preco" value="{{ old('preco') }}" step="0.01" min="0" required
                   style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;">
        </div>

        {{-- Se você adicionou 'funcao' na migration e quer um campo para ela, descomente abaixo: --}}
        {{--
        <div style="margin-bottom: 15px;">
            <label for="funcao" style="display: block; margin-bottom: 5px; font-weight: bold;">Função:</label>
            <input type="text" id="funcao" name="funcao" value="{{ old('funcao') }}"
                   style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;">
        </div>
        --}}

        <button type="submit"
                style="background-color: #28a745; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">
            Adicionar Produto
        </button>
    </form>

    <a href="{{ route('products.index') }}" class="nav-link" style="margin-top: 20px;">Voltar para a Lista de Produtos</a>
@endsection

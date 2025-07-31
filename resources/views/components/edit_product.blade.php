@extends('index')

@section('title', 'Editar Produto')

@section('content')
    <h1>Editar Produto: {{ $produto->nome }}</h1>

    @if ($errors->any())
        <div style="background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 10px; margin-bottom: 20px; border-radius: 5px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $produto->id) }}" method="POST" style="background-color: #f8f9fa; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
        @csrf
        @method('PUT') {{-- OBRIGATÓRIO para a rota PUT/PATCH do Laravel --}}

        <div style="margin-bottom: 15px;">
            <label for="nome" style="display: block; margin-bottom: 5px; font-weight: bold;">Nome do Produto:</label>
            <input type="text" id="nome" name="nome" value="{{ old('nome', $produto->nome) }}" required
                   style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="descricao" style="display: block; margin-bottom: 5px; font-weight: bold;">Descrição:</label>
            <textarea id="descricao" name="descricao" rows="5" required
                      style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;">{{ old('descricao', $produto->descricao) }}</textarea>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="preco" style="display: block; margin-bottom: 5px; font-weight: bold;">Preço:</label>
            <input type="number" id="preco" name="preco" value="{{ old('preco', $produto->preco) }}" step="0.01" min="0" required
                   style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;">
        </div>

        <button type="submit"
                style="background-color: #ffc107; color: black; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">
            Atualizar Produto
        </button>
    </form>

    <a href="{{ route('products.index') }}" class="nav-link" style="margin-top: 20px;">Voltar para a Lista de Produtos</a>
@endsection
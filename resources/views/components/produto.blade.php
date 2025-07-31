@extends('index')

@section('title', 'Nossos Produtos')

@section('content')
    <h1>Nossos Produtos Mecânicos</h1>

    {{-- Link para adicionar novo produto --}}
    <a href="{{ route('products.create') }}" class="nav-link" style="margin-bottom: 20px; display: inline-block; background-color: #007bff;">Adicionar Novo Produto</a>

    {{-- Exibir mensagem de sucesso após adicionar produto --}}
    @if (session('success'))
        <div style="background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 10px; margin-bottom: 20px; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif

    <ul class="product-list">
        @forelse($produtos as $produto)
            <li class="product-item">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h3>{{ $produto->nome }}</h3>
                    <div class="actions">
                        {{-- Botão de Edição --}}
                        <a href="{{ route('products.edit', $produto->id) }}" style="background-color: #ffc107; color: black; padding: 5px 10px; border-radius: 4px; text-decoration: none;">Editar</a>

                        {{-- Formulário de Exclusão --}}
                        <form action="{{ route('products.destroy', $produto->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE') {{-- OBRIGATÓRIO para a rota DELETE --}}
                            <button type="submit" style="background-color: #dc3545; color: white; padding: 5px 10px; border: none; border-radius: 4px; cursor: pointer;">Excluir</button>
                        </form>
                    </div>
                </div>
                <p>
                    **Descrição:** {{ $produto->descricao }}
                </p>
                <p>
                    **Preço:** R$ {{ number_format($produto->preco, 2, ',', '.') }}
                </p>
            </li>
        @empty
            <p>Nenhum produto cadastrado ainda. <a href="{{ route('products.create') }}">Adicione um agora!</a></p>
        @endforelse
    </ul>
@endsection
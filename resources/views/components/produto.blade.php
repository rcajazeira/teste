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
        {{-- O @empty é um recurso do Blade que exibe o conteúdo se o array estiver vazio --}}
        @forelse($produtos as $produto)
            <li class="product-item">
                <h3>{{ $produto->nome }}</h3>
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
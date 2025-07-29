@extends('index') {{-- ESSA LINHA É A PRIMEIRA E ÚNICA AQUI QUE SE REFERE AO LAYOUT --}}

@section('title', 'Nossos Produtos') {{-- Isso define o título específico desta página --}}

@section('content') {{-- Tudo o que estiver AQUI DENTRO será o conteúdo da sua página de produtos --}}
    <div class="container">
        <h1>Nossos Produtos Mecânicos</h1>
        <ul class="product-list">
            {{-- Loop para exibir os produtos que vêm do Controller --}}
            @foreach($produtos as $produto)
                <li class="product-item">
                    <h3>{{ $produto['nome'] }}</h3>
                    <p>
                        **Descrição:** {{ $produto['descricao'] }}
                    </p>
                    <p>
                        **Função:** {{ $produto['funcao'] }}
                    </p>
                </li>
            @endforeach
        </ul>
        {{-- O link "Voltar para a Página Inicial" está no cabeçalho do layout principal agora.
             Se você quiser um link só nesta página, pode colocar aqui.
        --}}
    </div>
@endsection {{-- Encerra a seção de conteúdo --}}
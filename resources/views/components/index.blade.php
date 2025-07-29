@extends('index') {{-- ESSA LINHA É A PRIMEIRA E ÚNICA AQUI QUE SE REFERE AO LAYOUT --}}

@section('title', 'Sobre a Empresa') {{-- Define o título específico desta página --}}

@section('content') {{-- Tudo o que estiver AQUI DENTRO será o conteúdo da sua página "Sobre a Empresa" --}}
    <div class="container">
        <h1>Sobre Nossa Empresa</h1>
        <p>
            Bem-vindo à nossa página "Sobre a Empresa". Somos uma companhia dedicada a
            oferecer as melhores soluções em produtos mecânicos de alta qualidade.
            Nossa missão é inovar e entregar excelência para nossos clientes,
            garantindo durabilidade e eficiência em cada item.
        </p>
        <p>
            Com anos de experiência no mercado, nossa equipe é composta por
            profissionais altamente qualificados e apaixonados pelo que fazem.
            Acreditamos que a qualidade e a satisfação do cliente são a chave
            para o nosso sucesso.
        </p>
        <p>
            Explore nossos produtos para conhecer mais sobre o que podemos
            oferecer!
        </p>
    </div>
@endsection {{-- Encerra a seção de conteúdo --}}
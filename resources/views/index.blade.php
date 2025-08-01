<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Meu Site Laravel')</title>
    <style>
        /* Seu CSS aqui */
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4; color: #333; }
        .container { background-color: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); max-width: 800px; margin: 20px auto; }
        h1 { color: #0056b3; }
        p { line-height: 1.6; }
        .nav-link { display: inline-block; margin: 0 10px; padding: 10px 15px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px; }
        .nav-link:hover { background-color: #0056b3; }
        .product-list { list-style: none; padding: 0; }
        .product-item { background-color: #e9ecef; margin-bottom: 10px; padding: 15px; border-radius: 5px; }
        .product-item h3 { margin-top: 0; color: #333; }
        .product-item p { margin-bottom: 0; font-size: 0.9em; }
        header { text-align: center; margin-bottom: 30px; background-color: #fff; padding: 15px; border-radius: 8px; box-shadow: 0 0 5px rgba(0,0,0,0.05); }
        footer { text-align: center; margin-top: 40px; padding: 20px; font-size: 0.8em; color: #666; background-color: #fff; border-radius: 8px; box-shadow: 0 0 5px rgba(0,0,0,0.05); }
    </style>
    @yield('head_extra')
</head>
<body>
    <header>
        <h1>Minha Empresa Laravel</h1>
        <nav>
            <a href="/" class="nav-link">Sobre a Empresa</a>
            <a href="/produtos" class="nav-link">Nossos Produtos</a>
            
            @guest {{-- Diretiva que exibe o conteúdo apenas se o usuário NÃO estiver logado --}}
                <a href="{{ route('login') }}" class="nav-link">Login</a>
                <a href="{{ route('register') }}" class="nav-link">Cadastro</a>
            @endguest

            @auth {{-- Diretiva que exibe o conteúdo apenas se o usuário ESTIVER logado --}}
                <a href="/dashboard" class="nav-link">Dashboard</a>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" style="background-color: #dc3545; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer;">
                        Logout
                    </button>
                </form>
            @endauth
        </nav>
    </header>

    <div class="container"> {{-- ESTE É O CONTAINER PRINCIPAL DO LAYOUT --}}
        @yield('content') {{-- AQUI O CONTEÚDO DA VIEW ESPECÍFICA SERÁ INSERIDO --}}
    </div>

    <footer>
        <p>&copy; {{ date('Y') }} Minha Empresa. Todos os direitos reservados.</p>
    </footer>

    @yield('scripts_extra')
</body>
</html>
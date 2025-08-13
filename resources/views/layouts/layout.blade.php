<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Loja Crisa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    {{-- ✅ IMPORTAÇÃO DO VITE (CSS e JS) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans">
    {{-- Classes atualizadas para o padrão layout-* --}}
    <header class="layout-main-header">
        <div class="layout-header-container">
            <a href="{{ route('layout') }}" class="layout-logo-link">
                <img src="#" alt="Logo" class="layout-logo-image">
                <span class="layout-logo-text">Loja Crisa</span>
            </a>

            <form action="#" method="GET" class="layout-desktop-search">
                <input type="text" name="busca" placeholder="Buscar produtos" class="layout-search-input">
                <button type="submit" class="layout-search-button">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>

            <div class="layout-quick-actions">
                <a href="#" class="layout-action-link layout-cart-link" title="Carrinho">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span>Carrinho</span>

                    @if(session('cart_count', 0) > 0)
                        <span class="layout-cart-count">
                            {{ session('cart_count') }}
                        </span>
                    @endif
                </a>

                {{-- Lógica correta para visitantes (guest) --}}
                @guest
                    <a href="{{ route('login') }}" class="layout-action-link" title="Entrar">
                        <i class="fa-solid fa-user"></i>
                        <span>Entrar</span>
                    </a>
                @endguest

                {{-- Lógica correta para usuários autenticados --}}
                @auth
                    <a href="#" class="layout-action-link" title="Minha Conta">
                        <i class="fa-solid fa-user"></i>
                        <span>{{ Auth::user()->name }}</span> {{-- Mostra o nome do usuário --}}
                    </a>
                    
                    {{-- O logout deve ser um formulário para segurança --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="layout-action-link" title="Sair">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span>Sair</span>
                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        {{-- Seu rodapé aqui --}}
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/imask"></script>
    <x-alertas />
</body>

</html>
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
    <header class="main-header">
        <div class="header-container">
            <a href="{{ route('layout') }}" class="logo-link">
                <img src="#" alt="Logo" class="logo-image">
                <span class="logo-text">Loja Crisa</span>
            </a>

            <form action="#" method="GET" class="desktop-search">
                <input type="text" name="busca" placeholder="Buscar produtos" class="search-input">
                <button type="submit" class="search-button">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>

            <div class="quick-actions">
                <a href="#" class="action-link cart-link" title="Carrinho">
                    <i class="fa-solid fa-cart-shopping"></i>
                    @if(session('cart_count', 0) > 0)
                        <span class="cart-count">
                            {{ session('cart_count') }}
                        </span>
                    @endif
                </a>
                @auth
                    <a href="#" class="action-link account-link" title="Minha Conta">
                        <i class="fa-solid fa-user"></i>
                        <span class="account-text">Minha Conta</span>
                    </a>
                @else
                    <a href="{{ route('criar') }}" class="action-link">Entrar</a>
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
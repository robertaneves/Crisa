<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Loja Crisa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>


    {{-- ✅ IMPORTAÇÃO DO VITE (CSS e JS) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans flex flex-col min-h-screen ">
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

                @guest
                    <a href="{{ route('login') }}" class="layout-action-link" title="Entrar">
                        <i class="fa-solid fa-user"></i>
                        <span>Entrar</span>
                    </a>
                @endguest

                @auth
                    <a href="{{ route('mostrar.cliente') }}" class="layout-action-link" title="Minha Conta">
                        <i class="fa-solid fa-user"></i>
                        <span>{{ Auth::user()->name }}</span>
                    </a>

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

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="footer-main">
        <div class="footer-container">
            <!-- Seção de Navegação e Contato -->
            <div class="footer-grid">
                <!-- Coluna: Institucional -->
                <div class="footer-column">
                    <h3 class="footer-column-title">Institucional</h3>
                    <ul class="footer-link-list">
                        <li><a href="{{ route('sobre.nos') }}" class="footer-link">Sobre a Loja Crisa</a></li>
                        <li><a href="#" class="footer-link">Nossas Lojas</a></li>
                        {{-- <li><a href="#" class="footer-link">Política de Privacidade</a></li>
                        <li><a href="#" class="footer-link">Termos de Uso</a></li> --}}
                    </ul>
                </div>

                <!-- Coluna: Contato -->
                <div class="footer-column">
                    <h3 class="footer-column-title">Atendimento</h3>
                    <ul class="footer-link-list">
                        <li class="footer-contact-item">
                            <i class="fa-solid fa-phone footer-contact-icon"></i>
                            <span>(71) 99936-5757</span>
                        </li>
                        <li class="footer-contact-item">
                            <i class="fa-solid fa-envelope footer-contact-icon"></i>
                            <span>lojacrisa@hotmail.com</span>
                        </li>
                        <li class="footer-contact-item">
                            <i class="fa-solid fa-clock footer-contact-icon"></i>
                            <span>Seg. a Sex. das 9h às 18h</span>
                        </li>
                    </ul>
                </div>

                <!-- Coluna: Formas de Pagamento -->
                <div class="footer-column">
                    <h3 class="footer-column-title">Formas de Pagamento</h3>
                    <div class="footer-payment-icons">
                        <i class="fa-brands fa-cc-visa" title="Visa"></i>
                        <i class="fa-brands fa-cc-mastercard" title="Mastercard"></i>
                        <i class="fa-brands fa-cc-paypal" title="PayPal"></i>
                        <i class="fa-solid fa-barcode" title="Boleto"></i>
                    </div>
                </div>
            </div>

            <!-- Divisor -->
            <hr class="footer-divider">

            <!-- Seção de Copyright e Redes Sociais -->
            <div class="footer-bottom">
                <p class="footer-copyright">
                    &copy; {{ date('Y') }} Loja Crisa. Todos os direitos reservados.
                </p>
                <div class="footer-social-icons">
                    <a href="https://www.instagram.com/lojacrisamf?igsh=bTdpMmk4b2pyMjN3" target="_blank" rel="noopener noreferrer" class="footer-social-link" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="footer-social-link" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="footer-social-link" title="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
                </div>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/imask"></script>
    <x-alertas />
</body>

</html>
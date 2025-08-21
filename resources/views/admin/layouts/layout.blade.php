<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Link to your compiled CSS file -->
    @vite(['resources/css/app.css'])

    <style>
        /* Define a fonte Inter como padrão */
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="admin-body">

    <div class="admin-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <a href="{{ route('admin.index') }}">
                    <h1 class="sidebar-title">Admin Crisa</h1>
                </a>
            </div>
            <div class="sidebar-content">
                <nav class="sidebar-nav">
                    <a href="{{ route('index.admin.produto') }}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" class="nav-link-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        Produtos
                    </a>
                    <a href="#" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" class="nav-link-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                        Pedidos
                    </a>
                    <a href="#" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" class="nav-link-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M15 21a6 6 0 00-9-5.197M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Clientes
                    </a>
                </nav>
            </div>
             <div class="sidebar-footer">
                <a href="#" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" class="footer-link-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                    Ver Loja
                </a>
                <a href="#" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" class="footer-link-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Sair
                </a>
            </div>
        </aside>

        <!-- Main content -->
        <div class="main-content">
            <!-- Header -->
            <header class="main-header">
                <!-- Título da Página e Menu Mobile -->
                <div class="header-left">
                    <!-- Botão do Menu Mobile -->
                    <button class="mobile-menu-button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <div>
                        <h2 class="page-title">Dashboard</h2>
                        <p class="page-subtitle">Bem-vindo ao painel administrativo da Loja Crisa!</p>
                    </div>
                </div>

                <!-- Ícones e Perfil do Usuário -->
                <div class="header-right">
                    <button class="notification-button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>
                    <div class="user-profile-container">
                        <button class="user-profile-button">
                            <img src="https://placehold.co/40x40/E2E8F0/4A5568?text=A" alt="Avatar do usuário" class="user-avatar">
                            <span class="user-name">Admin</span>
                        </button>
                    </div>
                </div>
            </header>
            
            @yield('content')
        </div>
    </div>
    
    <x-alertas />

</body>
</html>

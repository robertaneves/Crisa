<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo - Loja Crisa</title>
    {{-- Precisamos garantir que os ícones do Font Awesome estejam disponíveis --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <aside class="w-64 bg-gray-800 text-white p-4 flex flex-col">
            <a href="{{ route('admin.index') }}">
                <h1 class="text-2xl font-bold mb-6">Admin Crisa</h1>
            </a>
            <nav class="flex-grow">
                <ul>
                    <li><a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">Produtos</a></li>
                    <li><a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">Pedidos</a></li>
                    <li><a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">Clientes</a></li>
                </ul>
            </nav>
            
            {{-- Links Adicionais e Sair --}}
            <div>
                <hr class="my-4 border-gray-600">
                <ul>
                    <li>
                        {{-- O target="_blank" abre o link numa nova aba --}}
                        <a href="{{ route('layout') }}" target="_blank" class="block py-2 px-4 rounded hover:bg-gray-700">
                            Ver Loja <i class="fa-solid fa-arrow-up-right-from-square text-xs ml-1"></i>
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left block py-2 px-4 rounded hover:bg-gray-700">
                                Sair
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </aside>

        <main class="flex-1 p-8">
            @yield('content')
        </main>
    </div>
</body>
</html>
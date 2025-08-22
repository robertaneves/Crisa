@extends('admin.layouts.layout')

@section('content')
    <div class="p-4 sm:p-6 lg:p-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Dashboard</h1>

        <!-- Grid para os cartões de resumo (Stats Cards) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Cartão 1: Vendas Totais -->
            <div class="bg-white p-6 rounded-xl shadow-md flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Vendas Totais (Mês)</p>
                    <p class="text-2xl font-bold text-gray-900">R$ 12.345,67</p>
                </div>
                <div class="bg-blue-100 text-blue-600 rounded-full p-3">
                    <i class="fas fa-dollar-sign fa-lg"></i>
                </div>
            </div>
            <!-- Cartão 2: Novos Pedidos -->
            <div class="bg-white p-6 rounded-xl shadow-md flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Novos Pedidos (Hoje)</p>
                    <p class="text-2xl font-bold text-gray-900">23</p>
                </div>
                <div class="bg-green-100 text-green-600 rounded-full p-3">
                    <i class="fas fa-shopping-cart fa-lg"></i>
                </div>
            </div>
            <!-- Cartão 3: Novos Clientes -->
            <div class="bg-white p-6 rounded-xl shadow-md flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Novos Clientes (Semana)</p>
                    <p class="text-2xl font-bold text-gray-900">15</p>
                </div>
                <div class="bg-yellow-100 text-yellow-600 rounded-full p-3">
                    <i class="fas fa-users fa-lg"></i>
                </div>
            </div>
            <!-- Cartão 4: Produtos em Estoque -->
            <div class="bg-white p-6 rounded-xl shadow-md flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Produtos em Estoque</p>
                    <p class="text-2xl font-bold text-gray-900">1.204</p>
                </div>
                <div class="bg-indigo-100 text-indigo-600 rounded-full p-3">
                    <i class="fas fa-box-open fa-lg"></i>
                </div>
            </div>
        </div>

        <!-- Grid para conteúdo principal (Pedidos e Produtos) -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- Coluna de Pedidos Recentes (ocupa 2/3 em telas grandes) -->
            <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-md">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Pedidos Recentes</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="border-b">
                                <th class="py-2 px-4 font-medium text-gray-600">ID do Pedido</th>
                                <th class="py-2 px-4 font-medium text-gray-600">Cliente</th>
                                <th class="py-2 px-4 font-medium text-gray-600">Valor</th>
                                <th class="py-2 px-4 font-medium text-gray-600">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Item de Pedido Exemplo 1 -->
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-3 px-4 text-gray-700">#1234</td>
                                <td class="py-3 px-4 text-gray-700">João da Silva</td>
                                <td class="py-3 px-4 text-gray-700">R$ 150,00</td>
                                <td class="py-3 px-4">
                                    <span class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded-full">Enviado</span>
                                </td>
                            </tr>
                            <!-- Item de Pedido Exemplo 2 -->
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-3 px-4 text-gray-700">#1233</td>
                                <td class="py-3 px-4 text-gray-700">Maria Oliveira</td>
                                <td class="py-3 px-4 text-gray-700">R$ 89,90</td>
                                <td class="py-3 px-4">
                                    <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded-full">Pendente</span>
                                </td>
                            </tr>
                            <!-- Item de Pedido Exemplo 3 -->
                            <tr class="hover:bg-gray-50">
                                <td class="py-3 px-4 text-gray-700">#1232</td>
                                <td class="py-3 px-4 text-gray-700">Carlos Souza</td>
                                <td class="py-3 px-4 text-gray-700">R$ 299,50</td>
                                <td class="py-3 px-4">
                                    <span class="bg-red-100 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded-full">Cancelado</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Coluna de Produtos Mais Vendidos (ocupa 1/3 em telas grandes) -->
            <div class="bg-white p-6 rounded-xl shadow-md">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Produtos Mais Vendidos</h2>
                <ul>
                    <!-- Item de Produto Exemplo 1 -->
                    <li class="flex items-center justify-between py-3 border-b">
                        <span class="text-gray-700">Produto A</span>
                        <span class="font-semibold text-gray-900">120 vendidos</span>
                    </li>
                    <!-- Item de Produto Exemplo 2 -->
                    <li class="flex items-center justify-between py-3 border-b">
                        <span class="text-gray-700">Produto B</span>
                        <span class="font-semibold text-gray-900">98 vendidos</span>
                    </li>
                    <!-- Item de Produto Exemplo 3 -->
                    <li class="flex items-center justify-between py-3">
                        <span class="text-gray-700">Produto C</span>
                        <span class="font-semibold text-gray-900">75 vendidos</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
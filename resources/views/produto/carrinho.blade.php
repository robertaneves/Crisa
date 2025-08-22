@extends('layouts.layout')

@section('content')
    <div class="cart-page">
        <div class="cart-container">

            {{-- Cabeçalho da Página --}}
            <div class="cart-header">
                <h1 class="cart-title">Meu Carrinho</h1>
                @if (session()->has('carrinho') && count(session('carrinho')) > 0)
                    <a href="{{ route('layout') }}" class="cart-continue-link">Continuar Comprando</a>
                @endif
            </div>
            {{-- Verifica se o carrinho tem itens --}}
            @if (session('carrinho') && count(session('carrinho')) > 0)
                <div class="cart-grid">

                    {{-- Coluna de Itens do Carrinho --}}
                    <div class="cart-items-list">
                        @foreach (session('carrinho') as $id => $details)
                            <div class="cart-item">

                                <div class="item-imagem">
                                    <img src="{{ $details['imagem'] ?? 'https://placehold.co/100x100?text=Sem+Imagem' }}" alt="{{ $details['nome'] }}">
                                </div>

                                <div class="cart-item-details">
                                    <h3 class="cart-item-name">{{ $details['nome'] }}</h3>
                                    <p class="cart-item-price">R$ {{ number_format($details['preco'], 2, ',', '.') }}</p>

                                    {{-- Formulário para Atualizar Quantidade --}}
                                    <form action="{{ route('atualizar.carrinho', ['produto' => $id]) }}" method="POST"
                                        class="cart-quantity-form">
                                        @csrf
                                        @method('PATCH')
                                        <input type="number" name="quantidade" value="{{ $details['quantidade'] }}"
                                            min="1" class="cart-quantity-input">
                                        <button type="submit" class="cart-update-button">Atualizar</button>
                                    </form>
                                </div>

                                <div class="cart-item-actions">
                                    <p class="cart-item-subtotal">R$
                                        {{ number_format($details['preco'] * $details['quantidade'], 2, ',', '.') }}</p>
                                    {{-- Formulário para Remover Item --}}
                                    <form action="{{ route('delete.carrinho', ['produto' => $id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="cart-remove-button" title="Remover Item">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Coluna do Resumo do Pedido --}}
                    <aside class="cart-summary">
                        <h2 class="cart-summary-title">Resumo do Pedido</h2>

                        @php $total = array_sum(array_map(fn($item) => $item['preco'] * $item['quantidade'], session('carrinho'))) @endphp

                        <div class="cart-summary-row">
                            <span>Subtotal</span>
                            <span>R$ {{ number_format($total, 2, ',', '.') }}</span>
                        </div>
                        <div class="cart-summary-row">
                            <span>Frete</span>
                            <span>A calcular</span>
                        </div>
                        <div class="cart-summary-total">
                            <span>Total</span>
                            <span>R$ {{ number_format($total, 2, ',', '.') }}</span>
                        </div>
                        <a href="{{ route('index.checkout') }}" class="cart-checkout-button">Finalizar Compra</a>
                    </aside>
                </div>
            @else
                {{-- Mensagem de Carrinho Vazio --}}
                <div class="cart-empty">
                    <i class="fa-solid fa-cart-shopping cart-empty-icon"></i>
                    <h2 class="cart-empty-title">Seu carrinho está vazio</h2>
                    <p class="cart-empty-text">Adicione produtos para vê-los aqui.</p>
                    <a href="{{ route('layout') }}" class="cart-empty-button">Começar a Comprar</a>
                </div>
            @endif

        </div>
    </div>
@endsection
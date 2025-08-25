@extends('layouts.layout')

@section('content')
    <div class="produtos-container">
        <h2 class="titulo-principal">Bem-vindo à Loja Crisa!</h2>
        <p class="subtitulo">Aqui você encontra os melhores produtos.</p>
    </div>

    <div class="lista-produtos">
        @foreach ($produtos as $produto)
            @php
                $imagemPrincipal = $produto->imagens->where('principal', true)->first();
                $urlImagem = $imagemPrincipal ? asset('storage/' . $imagemPrincipal->pasta_imagem) : 'https://placehold.co/300x300?text=Produto';
            @endphp

            <div class="produto-card">
                <a href="{{ route('detalhes.produto', ['produto' => $produto->id]) }}" class="produto-link-imagem">
                    <div class="produto-imagem-wrapper">
                        <img src="{{ $urlImagem }}" alt="{{ $produto->nome }}" class="produto-imagem">
                    </div>
                </a>
                <div class="produto-info">
                    <h2 class="produto-nome">{{ $produto->nome }}</h2>
                    <p class="produto-preco">R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
                    <p class="produto-descricao">{{ Str::limit($produto->descricao, 80) }}</p>
                    <form action="{{ route('add.carrinho', ['produto' => $produto->id]) }}" method="POST" class="mt-auto">
                        @csrf
                        <button type="submit" class="btn-adicionar">Adicionar ao Carrinho</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    {{-- <section class="categories-section">
        <div class="categories-container">
            <h2 class="categories-title">Navegue por Categorias</h2>
            <div class="categories-grid">
                <!-- Categoria 1 -->
                <a href="#" class="category-card">
                    <img src="https://placehold.co/600x400/E2E8F0/4A5568?text=Vestidos" alt="[Imagem da categoria Vestidos]"
                        class="category-image">
                    <div class="category-overlay">
                        <h3 class="category-text">Vestidos</h3>
                    </div>
                </a>
                <!-- Categoria 2 -->
                <a href="#" class="category-card">
                    <img src="https://placehold.co/600x400/E2E8F0/4A5568?text=Blusas" alt="[Imagem da categoria Blusas]"
                        class="category-image">
                    <div class="category-overlay">
                        <h3 class="category-text">Blusas</h3>
                    </div>
                </a>
                <!-- Categoria 3 -->
                <a href="#" class="category-card">
                    <img src="https://placehold.co/600x400/E2E8F0/4A5568?text=Acessórios"
                        alt="[Imagem da categoria Acessórios]" class="category-image">
                    <div class="category-overlay">
                        <h3 class="category-text">Acessórios</h3>
                    </div>
                </a>
            </div>
        </div>
    </section> --}}
@endsection
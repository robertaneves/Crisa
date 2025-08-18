@extends('layouts.layout')

@section('content')

    <div class="produtos-container">
        <h2 class="titulo-principal">Bem-vindo à Loja Crisa!</h2>
        <p class="subtitulo">Aqui você encontra os melhores produtos.</p>
    </div> 

    <h1 class="titulo-secao">Nossos Produtos</h1>
    <div class="lista-produtos">
        {{-- Loop para percorrer cada produto enviado pelo controller --}}
        @foreach($produtos as $produto)
            <div class="produto-card">
                
                {{-- Aqui você pode adicionar a imagem do produto no futuro --}}
                {{-- <img src="..." alt="{{ $produto->name }}" class="produto-img"> --}}
                
                <h2 class="produto-nome">{{ $produto->name }}</h2>
                <p class="produto-preco"><strong>Preço:</strong> R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
                <p class="produto-descricao">{{ $produto->descricao }}</p>
                
                <form action="{{ route('add.carrinho', ['produto' => $produto->id]) }}" method="POST">
                    @csrf 
                    <button type="submit" class="btn-adicionar">Adicionar ao Carrinho</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection

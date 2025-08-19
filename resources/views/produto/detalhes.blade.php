@extends('layouts.layout')

@section('title', $produto->name)

@section('content')
<div class="detalhes-container">
    <div class="detalhes-grid">
        
        {{-- Coluna da Imagem --}}
        <div class="detalhes-imagem-coluna">
            {{-- Adicione a imagem real do produto aqui --}}
            <img src="#" class="detalhes-imagem-principal" alt="{{ $produto->name }}">
        </div>

        {{-- Coluna das Informações --}}
        <div class="detalhes-info-coluna">
            <h1 class="detalhes-nome-produto">{{ $produto->name }}</h1>
            <p class="detalhes-preco">R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>

            <div class="detalhes-info-bloco">
                <strong class="detalhes-info-label">Tamanho:</strong>
                <span>{{ $produto->tamanho }}</span>
            </div>

            <hr class="detalhes-divisor">

            <h2 class="detalhes-descricao-titulo">Descrição</h2>
            <p class="detalhes-descricao-texto">{{ $produto->descricao }}</p>

            <form action="{{ route('add.carrinho', ['produto' => $produto->id]) }}" method="POST" class="detalhes-form">
                @csrf
                <div>
                    <label for="quantidade" class="detalhes-quantidade-label">Quantidade:</label>
                    <input type="number" name="quantidade" id="quantidade" class="detalhes-quantidade-input" value="1" min="1">
                </div>
                <button type="submit" class="detalhes-btn-adicionar">Adicionar ao Carrinho</button>
            </form>
        </div>
    </div>
</div>
@endsection
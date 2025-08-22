@extends('admin.layouts.layout')
@section('content')
    <main class="main-content">
        <div class="page-header">
            <button class="mobile-menu-button">
                <svg xmlns="http://www.w3.org/2000/svg" class="menu-icon" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <div>
                <h2 class="page-title">Produtos</h2>
                <p class="page-subtitle">Gerencie os produtos da sua loja</p>
            </div>
        </div>

        <div class="section-header">
            <h3 class="section-title">Todos os Produtos</h3>
            <a href="{{ route('criar.admin.produto') }}" class="add-product-button">
                {{-- <svg xmlns="http://www.w3.org/2000/svg" class="add-icon" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg> --}}
                Adicionar Produto
            </a>
        </div>

        <div class="table-container">
            <table class="product-table">
                <thead class="table-head">
                    <tr>
                        <th scope="col" class="table-header-cell">Produto</th>
                        <th scope="col" class="table-header-cell">Categoria</th>
                        <th scope="col" class="table-header-cell">Preço</th>
                        <th scope="col" class="table-header-cell">Estoque</th>
                        {{-- <th scope="col" class="table-header-cell">Ativo</th> --}}
                        <th scope="col" class="table-header-cell-actions">
                            <span class="table-header-cell">Ações</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="table-body">
                    @foreach ($produtos as $produto)
                        <tr>
                            <td class="table-cell">
                                <div class="product-info-container">
                                    <div class="product-image-container">
                                        {{-- Se tiver imagem salva no banco --}}
                                        <img class="product-image"
                                            src="{{ $produto->imagem ?? 'https://placehold.co/100x100' }}"
                                            alt="{{ $produto->nome }}">
                                    </div>
                                    <div class="product-text-container">
                                        <div class="product-name">{{ $produto->nome }}</div>
                                        <div class="product-sku">ID: {{ $produto->id }}</div>
                                    </div>
                                </div>
                            </td>

                            <td class="table-cell-text">
                                {{-- Se tiver relação com categorias --}}
                                @if ($produto->categorias->count())
                                    {{ $produto->categorias->pluck('nome')->join(', ') }}
                                @else
                                    Sem categoria
                                @endif
                            </td>

                            <td class="table-cell-text">
                                R$ {{ number_format($produto->preco, 2, ',', '.') }}
                            </td>

                            <td class="table-cell">
                                @if ($produto->quantidade > 0)
                                    <span class="stock-badge stock-badge-in-stock">
                                        {{ $produto->quantidade }} em estoque
                                    </span>
                                @else
                                    <span class="stock-badge stock-badge-out-of-stock">
                                        Sem estoque
                                    </span>
                                @endif
                            </td>

                            {{-- <td>
                                <label class="switch-container">
                                    <input type="checkbox" name="ativo" class="switch-input" {{ old('ativo', $produto->ativo ?? false) ? 'checked' : '' }}>
                                    <span class="switch-slider">
                                        <span class="switch-circle"></span>
                                    </span>
                                </label>
                            </td> --}}

                            <td class="table-cell-actions">
                                <a href="{{ route('editar.admin.produto', $produto->id) }}" class="edit-link">Editar</a>
                                <form action=" {{ route('delete.admin.produto', $produto->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-link">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </main>
@endsection

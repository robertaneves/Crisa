@extends('admin.layouts.layout')
@section('content')
    <main class="main-content">
        <div class="page-header">
            <button class="mobile-menu-button">
                <svg xmlns="http://www.w3.org/2000/svg" class="menu-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                <svg xmlns="http://www.w3.org/2000/svg" class="add-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
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
                        <th scope="col" class="table-header-cell-actions">
                            <span class="sr-only">Ações</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="table-body">

                    <tr>
                        <td class="table-cell">
                            <div class="product-info-container">
                                <div class="product-image-container">
                                    <img class="product-image" src="https://placehold.co/100x100/CBD5E0/4A5568?text=P1" alt="Imagem do Produto">
                                </div>
                                <div class="product-text-container">
                                    <div class="product-name">Camiseta Básica</div>
                                    <div class="product-sku">SKU: CB-001</div>
                                </div>
                            </div>
                        </td>
                        <td class="table-cell-text">Vestuário</td>
                        <td class="table-cell-text">R$ 79,90</td>
                        <td class="table-cell">
                            <span class="stock-badge stock-badge-in-stock">120 em estoque</span>
                        </td>
                        <td class="table-cell-actions">
                            <a href="#" class="edit-link">Editar</a>
                            <a href="#" class="delete-link">Excluir</a>
                        </td>
                    </tr>

                    <tr>
                        <td class="table-cell">
                            <div class="product-info-container">
                                <div class="product-image-container">
                                    <img class="product-image" src="https://placehold.co/100x100/BEE3F8/2C5282?text=P2" alt="Imagem do Produto">
                                </div>
                                <div class="product-text-container">
                                    <div class="product-name">Caneca Personalizada</div>
                                    <div class="product-sku">SKU: CP-015</div>
                                </div>
                            </div>
                        </td>
                        <td class="table-cell-text">Acessórios</td>
                        <td class="table-cell-text">R$ 35,00</td>
                        <td class="table-cell">
                            <span class="stock-badge stock-badge-low-stock">15 em estoque</span>
                        </td>
                        <td class="table-cell-actions">
                            <a href="#" class="edit-link">Editar</a>
                            <a href="#" class="delete-link">Excluir</a>
                        </td>
                    </tr>

                    <tr>
                        <td class="table-cell">
                            <div class="product-info-container">
                                <div class="product-image-container">
                                    <img class="product-image" src="https://placehold.co/100x100/FED7D7/742A2A?text=P3" alt="Imagem do Produto">
                                </div>
                                <div class="product-text-container">
                                    <div class="product-name">Moletom com Capuz</div>
                                    <div class="product-sku">SKU: MC-003</div>
                                </div>
                            </div>
                        </td>
                        <td class="table-cell-text">Vestuário</td>
                        <td class="table-cell-text">R$ 189,90</td>
                        <td class="table-cell">
                            <span class="stock-badge stock-badge-out-of-stock">Sem estoque</span>
                        </td>
                        <td class="table-cell-actions">
                            <a href="#" class="edit-link">Editar</a>
                            <a href="#" class="delete-link">Excluir</a>
                        </td>
                    </tr>

                    </tbody>
            </table>
        </div>
    </main>
@endsection
@extends('admin.layouts.layout')

@section('content')
<main class="main-content">
    <div class="page-header">
        <div>
            <h2 class="page-title">Clientes</h2>
            <p class="page-subtitle">Gerencie os clientes cadastrados na sua loja</p>
        </div>
    </div>



    <div class="section-header">
        <h3 class="section-title">Todos os Clientes</h3>
        {{-- Futuramente, um botão para adicionar cliente manualmente --}}
        {{-- <a href="#" class="add-product-button">Adicionar Cliente</a> --}}
    </div>

    <div class="table-container">
        <table class="product-table">
            <thead class="table-head">
                <tr>
                    <th scope="col" class="table-header-cell">Nome</th>
                    <th scope="col" class="table-header-cell">Email</th>
                    <th scope="col" class="table-header-cell">Telefone</th>
                    <th scope="col" class="table-header-cell">Data de Cadastro</th>
                    <th scope="col" class="table-header-cell-actions">
                        <span class="table-header-cell">Ações</span>
                    </th>
                </tr>
            </thead>
            <tbody class="table-body">
                @forelse ($clientes as $cliente)
                    <tr>
                        <td class="table-cell-text">{{ $cliente->name }}</td>
                        <td class="table-cell-text">{{ $cliente->email }}</td>
                        <td class="table-cell-text">{{ $cliente->telefone ?? 'Não informado' }}</td>
                        <td class="table-cell-text">{{ $cliente->created_at->format('d/m/Y') }}</td>
                        <td class="table-cell-actions">
                            <a href="#" class="edit-link">Ver Detalhes</a>
                            {{-- Ações de Editar e Excluir podem ser adicionadas aqui --}}
                            {{-- <form action="#" method="POST" class="inline delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-link">Excluir</button>
                            </form> --}}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500">
                            Nenhum cliente cadastrado ainda.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</main>
@endsection
@extends('admin.layouts.layout')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Adicionar Novo Produto</h1>

    {{-- Exibição de Erros de Validação --}}
    @if ($errors->any())
        <div class="bg-red-500 text-white p-4 rounded mb-4">
            <strong>Ups!</strong> Ocorreram alguns problemas com os seus dados.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white shadow-md rounded-lg p-8">
        {{-- O action aponta para a rota que irá guardar os dados --}}
        <form action="{{ route('store.admin.produto') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Coluna da Esquerda --}}
                <div>
                    <div class="mb-4">
                        <label for="nome" class="block text-gray-700 text-sm font-bold mb-2">Nome do Produto</label>
                        <input type="text" name="nome" id="nome" value="{{ old('nome') }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="preco" class="block text-gray-700 text-sm font-bold mb-2">Preço (R$)</label>
                        <input type="number" name="preco" id="preco" value="{{ old('preco') }}" step="0.01"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="quantidade" class="block text-gray-700 text-sm font-bold mb-2">Quantidade em
                            Stock</label>
                        <input type="number" name="quantidade" id="quantidade" value="{{ old('quantidade') }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            required>
                    </div>
                </div>

                {{-- Coluna da Direita --}}
                {{-- <div class="form-group">
                    <label for="tamanho" class="register-label">Tamanho</label>
                    <select name="tamanho" id="tamanho" class="select-tamanho" required>
                        <option value="">Selecione</option>
                        @foreach ($tamanhos as $tamanho)
                            <option value="{{ $tamanho }}" {{ old('tamanho') == $tamanho ? 'selected' : '' }}>
                                {{ ucfirst($tamanho) }}
                            </option>
                        @endforeach
                    </select>
                </div> --}}
                <div>
                    <div class="mb-4">
                        <label for="descricao" class="block text-gray-700 text-sm font-bold mb-2">Descrição</label>
                        <textarea name="descricao" id="descricao" rows="5"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('descricao') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Categorias</label>
                        <div class="bg-white p-2 border rounded max-h-40 overflow-y-auto">
                            @foreach ($categorias as $categoria)
                                <div class="flex items-center">
                                    <input type="checkbox" name="categorias[]" value="{{ $categoria->id }}"
                                        id="categoria-{{ $categoria->id }}" class="mr-2">
                                    <label for="categoria-{{ $categoria->id }}">{{ $categoria->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex justify-end">
                <a href="{{ route('index.admin.produto') }}"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-4">
                    Cancelar
                </a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Guardar Produto
                </button>
            </div>
        </form>
    </div>
@endsection

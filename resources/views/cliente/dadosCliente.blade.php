@extends('layouts.layout')

@section('content')
    <div class="container mx-auto p-4 md:p-8">

        {{-- Cabeçalho da Página --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Meus Dados</h1>
            <p class="text-gray-500 mt-1">Visualize e mantenha suas informações sempre atualizadas.</p>
        </div>

        {{-- Formulário de Edição --}}
        {{--
        A rota 'cliente.update' é um exemplo. Use a rota que você criou para atualizar o cliente.
        Passamos o ID do cliente para saber qual registro atualizar.
        --}}
        <form method="POST" action="">
            @csrf
            @method('PUT') {{-- Método HTTP para atualização --}}

            <div class="bg-white rounded-lg shadow-md overflow-hidden">

                {{-- Corpo do Formulário --}}
                <div class="p-6 md:p-8 space-y-8">

                    <!-- Seção: Dados Pessoais -->
                    <div class="space-y-6">
                        <h2 class="text-xl font-semibold text-gray-700 border-b pb-3">Dados Pessoais</h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            {{-- Nome --}}
                            <div>
                                <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
                                <input type="text" id="nome" name="nome" value="" class="register-input mt-1">
                            </div>

                            {{-- Sobrenome --}}
                            <div>
                                <label for="sobrenome" class="block text-sm font-medium text-gray-700">Sobrenome</label>
                                <input type="text" id="sobrenome" name="sobrenome" value="" class="register-input mt-1">
                            </div>

                            {{-- E-mail (geralmente não editável) --}}
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                                <input type="email" id="email" name="email" value="" class="register-input mt-1">
                            </div>

                            {{-- CPF (geralmente não editável) --}}
                            <div>
                                <label for="cpf" class="block text-sm font-medium text-gray-700">CPF</label>
                                <input type="text" id="cpf" name="cpf" value="" class="register-input mt-1 bg-gray-100" readonly>
                                <p class="text-xs text-gray-500 mt-1">O e-mail não pode ser alterado.</p>

                            </div>
                        </div>
                    </div>

                    <!-- Seção: Endereço de Entrega -->
                    <div class="space-y-6">
                        <h2 class="text-xl font-semibold text-gray-700 border-b pb-3">Endereço Principal</h2>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            {{-- CEP --}}
                            <div class="md:col-span-1">
                                <label for="cep" class="block text-sm font-medium text-gray-700">CEP</label>
                                <input type="text" id="cep" name="cep" value="" class="register-input mt-1">
                            </div>

                            {{-- Rua --}}
                            <div class="md:col-span-2">
                                <label for="rua" class="block text-sm font-medium text-gray-700">Rua / Logradouro</label>
                                <input type="text" id="rua" name="rua" value="" class="register-input mt-1">
                            </div>

                            {{-- Número e Complemento --}}
                            <div>
                                <label for="numero" class="block text-sm font-medium text-gray-700">Número</label>
                                <input type="text" id="numero" name="numero" value="" class="register-input mt-1">
                            </div>
                            <div class="md:col-span-2">
                                <label for="complemento" class="block text-sm font-medium text-gray-700">Complemento <span
                                        class="text-gray-500">(Opcional)</span></label>
                                <input type="text" id="complemento" name="complemento" value="" class="register-input mt-1">
                            </div>

                            {{-- Bairro, Cidade e Estado --}}
                            <div>
                                <label for="bairro" class="block text-sm font-medium text-gray-700">Bairro</label>
                                <input type="text" id="bairro" name="bairro" value="" class="register-input mt-1">
                            </div>
                            <div>
                                <label for="cidade" class="block text-sm font-medium text-gray-700">Cidade</label>
                                <input type="text" id="cidade" name="cidade" value="" class="register-input mt-1">
                            </div>
                            <div>
                                <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
                                <input type="text" id="estado" name="estado" value="" class="register-input mt-1">
                            </div>
                        </div>
                    </div>

                </div>

                {{-- Rodapé do Formulário com o Botão de Salvar --}}
                <div class="bg-gray-50 px-6 py-4 text-right">
                    <button type="submit" class="register-btn-primary py-2 px-6">
                        Salvar Alterações
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
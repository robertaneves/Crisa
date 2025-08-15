@extends('layouts.layout')

@section('content')
    <div class="dados-page-container">

        <div x-data="{ editing: false }">

            {{-- Cabeçalho da Página --}}
            <div class="dados-header">
                <div class="dados-header-content">
                    <h1 class="dados-title">Meus Dados</h1>
                    <p class="dados-subtitle">Visualize e mantenha suas informações sempre atualizadas.</p>
                </div>
                <button x-show="!editing" @click="editing = true" type="button" class="dados-edit-btn">
                    Editar Dados
                </button>
            </div>

            {{-- MODO DE VISUALIZAÇÃO --}}
            <div x-show="!editing" x-transition class="dados-card">
                <h2 class="dados-card-title">Dados Pessoais</h2>
                <dl class="dados-info-grid">
                    <div class="dados-info-item">
                        <dt class="dados-info-label">Nome</dt>
                        <dd class="dados-info-value">{{ $user->name }}</dd>
                    </div>
                    <div class="dados-info-item">
                        <dt class="dados-info-label">E-mail</dt>
                        <dd class="dados-info-value">{{ $user->email }}</dd>
                    </div>
                    <div class="dados-info-item">
                        <dt class="dados-info-label">Telefone</dt>
                        <dd class="dados-info-value">{{ $user->telefone ?? 'Não informado' }}</dd>
                    </div>
                    <div class="dados-info-item">
                        <dt class="dados-info-label">Gênero</dt>
                        <dd class="dados-info-value">{{ ucfirst($user->genero ?? 'Não informado') }}</dd>
                    </div>
                    <div class="dados-info-item">
                        <dt class="dados-info-label">CPF</dt>
                        <dd class="dados-info-value">{{ $user->cpf }}</dd>
                    </div>
                </dl>
            </div>

            {{-- MODO DE EDIÇÃO --}}
            <div x-show="editing" x-transition>
                <form method="POST" action="{{ route('info.cliente') }}" class="dados-edit-form">
                    @csrf
                    @method('PUT')
                    <div class="dados-card-form">
                        <div class="dados-form-body">
                            <div class="space-y-6">
                                <h2 class="dados-card-title">Editando Dados Pessoais</h2>
                                <div class="dados-form-grid">
                                    {{-- Nome --}}
                                    <div>
                                        <label for="name" class="register-label">Nome</label>
                                        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                                            class="register-input mt-1">
                                    </div>
                                    {{-- E-mail (não editável) --}}
                                    <div>
                                        <label for="email" class="register-label">E-mail</label>
                                        <input type="email" id="email" name="email" value="{{ $user->email }}"
                                            class="register-input mt-1 bg-gray-100" readonly>
                                    </div>
                                    {{-- Telefone --}}
                                    <div>
                                        <label for="telefone" class="register-label">Telefone</label>
                                        <input type="text" id="telefone" name="telefone"
                                            value="{{ old('telefone', $user->telefone) }}" class="register-input mt-1">
                                    </div>
                                    {{-- Gênero --}}
                                    <div>
                                        <label for="genero" class="register-label">Gênero</label>
                                        <select name="genero" id="genero" class="register-input mt-1">
                                            @php $generos = ['feminino', 'masculino', 'outro']; @endphp
                                            @foreach($generos as $genero)
                                                <option value="{{ $genero }}" {{ old('genero', $user->genero) == $genero ? 'selected' : '' }}>
                                                    {{ ucfirst($genero) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- CPF (não editável) --}}
                                    <div>
                                        <label for="cpf" class="register-label">CPF</label>
                                        <input type="text" id="cpf" name="cpf" value="{{ $user->cpf }}"
                                            class="register-input mt-1 bg-gray-100" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Rodapé com botões --}}
                        <div class="dados-form-footer">
                            <button @click="editing = false" type="button" class="dados-cancel-btn">
                                Cancelar
                            </button>
                            <button type="submit" class="dados-edit-btn py-2 px-6">
                                Salvar Alterações
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
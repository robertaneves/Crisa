@extends('layouts.layout')

@section('content')
<div class="dados-page-container">

    <div x-data="{ editing: false }">

        {{-- Cabeçalho da Página --}}
        <div class="dados-header">
            <div class="dados-header-content">
                <h1 class="dados-title">Meus Endereços</h1>
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
                    <dt class="dados-info-label">Rua</dt>
                    <dd class="dados-info-value">{{ $user->endereco->rua }}</dd>
                </div>
                <div class="dados-info-item">
                    <dt class="dados-info-label">Número</dt>
                    <dd class="dados-info-value">{{ $user->endereco->numero }}</dd>
                </div>
                <div class="dados-info-item">
                    <dt class="dados-info-label">Complemento</dt>
                    <dd class="dados-info-value">{{ $user->endereco->complemento}}</dd>
                </div>
                <div class="dados-info-item">
                    <dt class="dados-info-label">Bairro</dt>
                    <dd class="dados-info-value">{{ $user->endereco->bairro }}</dd>
                </div>
                <div class="dados-info-item">
                    <dt class="dados-info-label">Cidade</dt>
                    <dd class="dados-info-value">{{ $user->endereco->cidade }}</dd>
                </div>
                <div class="dados-info-item">
                    <dt class="dados-info-label">Estado</dt>
                    <dd class="dados-info-value">{{ $user->endereco->estado }}</dd>
                </div>
                <div class="dados-info-item">
                    <dt class="dados-info-label">CEP</dt>
                    <dd class="dados-info-value">{{ $user->endereco->cep }}</dd>
                </div>
            </dl>
        </div>

        {{-- MODO DE EDIÇÃO --}}
        <div x-show="editing" x-transition>
            <form method="POST" action="{{ route('info.endereco') }}" class="dados-edit-form">
                @csrf
                @method('PUT')
                <div class="dados-card-form">
                    <div class="dados-form-body">
                        <div class="space-y-6">
                            <h2 class="dados-card-title">Editando Dados Pessoais</h2>
                            <div class="dados-form-grid">
                                {{-- Nome --}}
                                <div>
                                    <label for="rua" class="register-label">Rua</label>
                                    <input type="text" id="rua" name="rua" value="{{ $user->endereco->rua }}" class="register-input mt-1">
                                </div>
                                {{--  Número --}}
                                <div>
                                    <label for="numero" class="register-label">Número</label>
                                    <input type="text" id="numero" name="numero" value="{{ $user->endereco->numero }}" class="register-input mt-1 " >
                                </div>
                                {{-- Complemento --}}
                                <div>
                                    <label for="complemento" class="register-label">Complemento</label>
                                    <input type="text" id="complemento" name="complemento" value="{{ $user->endereco->complemento }}" class="register-input mt-1">
                                </div>
                              
                                {{-- Bairro --}}
                                <div>
                                    <label for="bairro" class="register-label">Bairro</label>
                                    <input type="text" id="bairro" name="bairro" value="{{ $user->endereco->bairro }}" class="register-input mt-1 ">
                                </div>

                                {{-- Cidade --}}
                                <div>
                                    <label for="cidade" class="register-label">Cidade</label>
                                    <input type="text" id="cidade" name="cidade" value="{{ $user->endereco->cidade }}" class="register-input mt-1 ">
                                </div>

                                {{-- Estado --}}
                                <div>
                                    <label for="estado" class="register-label">Estado</label>
                                    <input type="text" id="estado" name="estado" value="{{ $user->endereco->estado }}" class="register-input mt-1">
                                </div>

                                {{-- CEP --}}
                                <div>
                                    <label for="cep" class="register-label">CEP</label>
                                    <input type="text" id="cep" name="cep" value="{{ $user->endereco->cep }}" class="register-input mt-1">
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

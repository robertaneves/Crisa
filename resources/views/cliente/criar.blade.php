@extends('layouts.layout')

@section('content')
    <div class="register-page-container">
        <div class="register-card">
            <div class="register-header">
                <h1 class="register-title">Cadastro de Clientes</h1>
            </div>

            <div class="register-body">
                <form action="{{ route('criar.processo') }}" method="POST" class="register-form">
                    @csrf

                    <div class="register-section">
                        <h2 class="register-section-title">Dados Pessoais</h2>
                        <div class="register-personal-grid">
                            <div>
                                <label for="name" class="register-label">Nome Completo:</label>
                                <input type="text" class="register-input" name="name" id="name"
                                    placeholder="Digite seu nome completo" value="{{ old('name') }}">
                            </div>
                            <div>
                                <label for="email" class="register-label">Email:</label>
                                <input type="email" class="register-input" name="email" id="email"
                                    placeholder="Digite seu email">
                            </div>
                            <div>
                                <label for="telefone" class="register-label">Telefone:</label>
                                <input type="text" class="register-input" name="telefone" id="telefone"
                                    placeholder="(00) 00000-0000" maxlength="15">
                            </div>
                            <div>
                                <label for="cpf" class="register-label">CPF:</label>
                                <input type="text" class="register-input" name="cpf" id="cpf" placeholder="000.000.000-00"
                                    maxlength="14">
                            </div>
                            <div>
                                <label for="password" class="register-label">Senha:</label>
                                <input type="password" class="register-input" name="password" id="password"
                                    placeholder="Crie uma senha forte">
                            </div>
                            <div>
                                <label for="password_confirmation" class="register-label">Repita sua senha:</label>
                                <input type="password" class="register-input" name="password_confirmation"
                                    id="password_confirmation" placeholder="Confirme sua senha">
                            </div>
                        </div>
                    </div>

                    <div class="register-section">
                        <h2 class="register-section-title">Dados do Endereço</h2>
                        <div class="register-address-grid">
                            <div class="col-span-2">
                                <label for="rua" class="register-label">Rua:</label>
                                <input type="text" class="register-input" name="rua" id="rua" placeholder="Digite sua rua">
                            </div>
                            <div>
                                <label for="numero" class="register-label">Número:</label>
                                <input type="text" class="register-input" name="numero" id="numero" placeholder="Nº">
                            </div>
                            <div class="col-span-full">
                                <label for="complemento" class="register-label">Complemento: <span
                                        class="register-label-optional">(Opcional)</span></label>
                                <input type="text" class="register-input" name="complemento" id="complemento"
                                    placeholder="Apto, Bloco, etc.">
                            </div>
                            <div>
                                <label for="bairro" class="register-label">Bairro:</label>
                                <input type="text" class="register-input" name="bairro" id="bairro"
                                    placeholder="Digite seu bairro">
                            </div>
                            <div>
                                <label for="cidade" class="register-label">Cidade:</label>
                                <input type="text" class="register-input" name="cidade" id="cidade"
                                    placeholder="Digite sua cidade">
                            </div>
                            <div>
                                <label for="estado" class="register-label">Estado:</label>
                                <input type="text" class="register-input" name="estado" id="estado" placeholder="UF"
                                    maxlength="2">
                            </div>
                            <div class="col-span-full">
                                <label for="cep" class="register-label">CEP:</label>
                                <input type="text" class="register-input" name="cep" id="cep" placeholder="00000-000"
                                    maxlength="9">
                            </div>
                        </div>
                    </div>

                    <div class="register-footer">
                        {{-- O botão agora é full-width para combinar com o layout --}}
                        <button type="submit" class="register-btn-primary">
                            Criar Conta
                        </button>
                    </div>

                    <p class="register-footer-text">Já possui conta?
                        <a href="{{ route('login') }}" class="register-link">Login</a>
                    </p>

                </form>
            </div>
        </div>
    </div>
@endsection
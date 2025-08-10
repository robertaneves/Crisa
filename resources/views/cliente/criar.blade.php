@extends('layouts.layout')

@section('content')
<div class="form-page-container">
    <div class="form-card">
        
        <div class="form-header">
            <h1 class="form-title">Cadastro de Clientes</h1>
        </div>

        <div class="form-body">
            <form action="{{ route('criar.processo') }}" method="POST" class="form-grid">
                @csrf
                
                <!-- DADOS PESSOAIS -->
                <div class="form-section">
                    <h2 class="section-title">Dados Pessoais</h2>
                    <div class="section-grid">
                        <div>
                            <label for="name" class="form-label">Nome Completo:</label>
                            <input type="text" class="form-input" name="name" id="name" placeholder="Digite seu nome completo" value="{{ old('name') }}">
                        </div>
                        <div>
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-input" name="email" id="email" placeholder="Digite seu email">
                        </div>
                        <div>
                            <label for="telefone" class="form-label">Telefone:</label>
                            <input type="text" class="form-input" name="telefone" id="telefone" placeholder="(00) 00000-0000" maxlength="15">
                        </div>
                        <div>
                            <label for="cpf" class="form-label">CPF:</label>
                            <input type="text" class="form-input" name="cpf" id="cpf" placeholder="000.000.000-00" maxlength="14">
                        </div>
                        <div>
                            <label for="password" class="form-label">Senha:</label>
                            <input type="password" class="form-input" name="password" id="password" placeholder="Crie uma senha forte">
                        </div>
                        <div>
                            <label for="password_confirmation" class="form-label">Repita sua senha:</label>
                            <input type="password" class="form-input" name="password_confirmation" id="password_confirmation" placeholder="Confirme sua senha">
                        </div>
                    </div>
                </div>

                <!-- DADOS DO ENDEREÇO -->
                <div class="form-section">
                    <h2 class="section-title">Dados do Endereço</h2>
                    <div class="address-grid">
                         <div class="col-span-full">
                            <label for="cep" class="form-label">CEP:</label>
                            <input type="text" class="form-input" name="cep" id="cep" placeholder="Digite seu CEP" maxlength="14">
                        </div>
                        <div class="col-span-2">
                            <label for="rua" class="form-label">Rua:</label>
                            <input type="text" class="form-input" name="rua" id="rua" placeholder="Digite sua rua">
                        </div>
                        <div>
                            <label for="numero" class="form-label">Número:</label>
                            <input type="text" class="form-input" name="numero" id="numero" placeholder="Nº">
                        </div>
                         <div class="col-span-full">
                            <label for="complemento" class="form-label">Complemento: <span class="label-optional">(Opcional)</span></label>
                            <input type="text" class="form-input" name="complemento" id="complemento" placeholder="Apto, Bloco, etc.">
                        </div>
                        <div>
                            <label for="bairro" class="form-label">Bairro:</label>
                            <input type="text" class="form-input" name="bairro" id="bairro" placeholder="Digite seu bairro">
                        </div>
                        <div>
                            <label for="cidade" class="form-label">Cidade:</label>
                            <input type="text" class="form-input" name="cidade" id="cidade" placeholder="Digite sua cidade">
                        </div>
                        <div>
                            <label for="estado" class="form-label">Estado:</label>
                            <input type="text" class="form-input" name="estado" id="estado" placeholder="UF" maxlength="2">
                        </div>
                    </div>
                </div>

                <div class="form-footer">
                    <button type="submit" class="btn-primary">
                        Criar Conta
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

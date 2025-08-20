@extends('layouts.layout')
@section('content')
    <div class="change-password-container">
        <div class="change-password-card">
            <div class="change-password-header">
                <h1 class="change-password-title">Alterar Senha</h1>
                <p class="change-password-subtitle">Para sua segurança, por favor, insira sua senha atual antes de definir uma nova.</p>
            </div>

            <form class="change-password-form" action="{{ route('alterar.senha') }}" method="POST">
                @csrf
                @method('PUT')
                <!-- Campo Senha Atual -->
                <div>
                    <label for="senha_atual" class="change-password-label">Senha Atual</label>
                    <input type="password" id="senha_atual" name="senha_atual" class="change-password-input" required>
                </div>

                <!-- Campo Nova Senha -->
                <div>
                    <label for="senha_nova" class="change-password-label">Nova Senha</label>
                    <input type="password" id="senha_nova" name="senha_nova" class="change-password-input" required>
                </div>

                <!-- Campo Confirmar Nova Senha -->
                <div>
                    <label for="senha_nova_confirmation" class="change-password-label">Confirmar Nova Senha</label>
                    <input type="password" id="senha_nova_confirmation" name="senha_nova_confirmation" class="change-password-input" required>
                </div>

                <!-- Botão de Salvar -->
                <div class="pt-2">
                    <button type="submit" class="change-password-btn-primary">Salvar Nova Senha</button>
                </div>

                <!-- Link de Cancelar -->
                <div>
                     <a href="{{ route('mostrar.cliente') }}" class="change-password-cancel-link">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
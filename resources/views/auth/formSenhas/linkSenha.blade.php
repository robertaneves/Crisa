@extends('layouts.layout')
@section('content')
    <div class="forgot-container">
        <div class="forgot-card">
            <div class="forgot-header">
                <h1 class="forgot-title">Digite sua nova senha</h1>
                <p class="forgot-subtitle">Por favor, atualize sua senha.</p>
            </div>

            <form method="POST" action="{{ route('link.processo') }}" class="forgot-form">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ $email }}">

                <div>
                    <label for="password" class="forgot-label">Senha:</label>
                    <div class="mt-1">
                        <input id="password" name="password" type="password" required class="forgot-input"
                               placeholder="Digite sua nova senha">
                    </div>
                </div>

                <div>
                    <label for="password_confirmation" class="forgot-label">Confirme a Nova Senha:</label>
                    <div class="mt-1">
                        <input id="password_confirmation" name="password_confirmation" type="password" required
                               class="forgot-input" placeholder="Repita sua nova senha">
                    </div>
                </div>

                <div>
                    <button type="submit" class="forgot-btn-primary">Salvar Nova Senha</button>
                </div>
            </form>
        </div>
    </div>
@endsection
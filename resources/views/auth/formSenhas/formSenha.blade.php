@extends('layouts.layout')
@section('content')
    <div class="forgot-container">
        <div class="forgot-card">
            <div class="forgot-header">
                <h1 class="forgot-title">Esqueceu sua senha?</h1>
                <p class="forgot-subtitle">Por favor, insira seu email para recuperação.</p>
            </div>

            <form method="POST" action="{{ route('senha.processo') }}" class="forgot-form">
                @csrf
                <div>
                    <label for="email" class="forgot-label">Email:</label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" autocomplete="email" required class="forgot-input"
                               placeholder="seu.email@exemplo.com" value="{{ old('email') }}">
                    </div>
                </div>
                <div>
                    <button type="submit" class="forgot-btn-primary">Recuperar</button>
                </div>
            </form>
            <p class="forgot-footer-text">
                Acesse sua conta
                <a href="{{ route('login') }}" class="forgot-link">Faça login</a>
            </p>
        </div>
    </div>
@endsection
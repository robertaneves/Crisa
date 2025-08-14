@extends('layouts.layout')

@section('content')

    {{-- O container principal já tem as classes de centralização --}}
    <div class="login-container">

        <div class="login-card">

            <div class="login-header">
                <h1 class="login-title">Acesse sua Conta</h1>
                <p class="login-subtitle">Bem-vindo de volta! Por favor, insira seus dados.</p>
            </div>

            <form method="POST" action="{{ route('login.proccesso') }}" class="login-form">
                @csrf

                <div>
                    <label for="email" class="login-label">Email</label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" autocomplete="email" required class="login-input"
                            placeholder="seu.email@exemplo.com" value="{{ old('email') }}">
                    </div>
                </div>

                <div>
                    <label for="password" class="login-label">Senha</label>
                    <div class="mt-1">
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="login-input" placeholder="Sua senha">
                    </div>
                </div>

                <div class="login-options">
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox" class="login-checkbox">
                        {{-- A label do checkbox não precisa de uma classe customizada --}}
                        <label for="remember" class="ml-2 block text-sm text-gray-900">Lembrar-me</label>
                    </div>

                    <div class="text-sm">
                        <a href="{{ route('form.senha') }}" class="login-link">Esqueceu sua senha?</a>
                    </div>
                </div>

                <div>
                    <button type="submit" class="login-btn-primary">Entrar</button>
                </div>
            </form>

            <p class="login-footer-text">Não tem uma conta?
                <a href="{{ route('criar') }}" class="login-link">Cadastre-se aqui</a>
            </p>
        </div>
    </div>

@endsection
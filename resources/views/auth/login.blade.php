@extends('layouts.layout')
@section('content')

    <div class="flex items-center justify-center min-h-screen">

        <!-- Card de Login -->
        <div class="login-container">

            <div class="login-card">

                <div class="card-header">
                    <h1 class="card-title">Acesse sua Conta</h1>
                    <p class="card-subtitle">Bem-vindo de volta! Por favor, insira seus dados.</p>
                </div>

                <form method="POST" action="{{ route('login.proccess') }}" class="login-form">
                    @csrf

                    <div>
                        <label for="email" class="form-label">Email</label>
                        <div class="mt-1">
                            <input id="email" name="email" type="email" autocomplete="email" required class="form-input"
                                placeholder="seu.email@exemplo.com" value="{{ old('email') }}">
                        </div>
                    </div>

                    <div>
                        <label for="password" class="form-label">Senha</label>
                        <div class="mt-1">
                            <input id="password" name="password" type="password" autocomplete="current-password" required
                                class="form-input" placeholder="Sua senha">
                        </div>
                    </div>

                    <div class="form-options">
                        <div class="flex items-center">
                            <input id="remember" name="remember" type="checkbox" class="form-checkbox">
                            <label for="remember" class="ml-2 block text-sm text-gray-900">Lembrar-me</label>
                        </div>

                        <div class="text-sm">
                            <a href="#" class="link">Esqueceu sua senha?</a>
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="btn-primary">Entrar</button>
                    </div>
                </form>

                <p class="card-footer">Não tem uma conta?
                    <a href="{{ route('criar') }}" class="link">Cadastre-se aqui</a>
                </p>
            </div>
        </div>

@endsection
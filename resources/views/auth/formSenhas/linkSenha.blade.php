@extends('layouts.layout')
@section('content')
    <div class="forgot-container">

        <div class="forgot-card">
            <div class="forgot-header">
                <h1 class="forgot-title">Digite sua nova senha</h1>
                <p class="forgot-subtitle">Por favor, atualize sua senha.</p>
            </div>

            <form method="POST" action="" class="forgot-form">
                @csrf

                {{-- <div>
                    <label for="email" class="forgot-label">Email:</label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" autocomplete="email" required class="forgot-input"
                            placeholder="seu.email@exemplo.com" value="{{ old('email') }}">
                    </div>
                </div> --}}

                <div>
                    <label for="password" class="forgot-label">Senha:</label>
                    <div class="mt-1">
                        <input id="password" name="password" type="text" required class="forgot-input" 
                            placeholder="Digite sua nova senha">
                    </div>
                </div> 
                <div>
                    <label for="password" class="forgot-label">Repita sua senha:</label>
                    <div class="mt-1">
                        <input id="password" name="password" type="text" required class="forgot-input" 
                            placeholder="Repita sua nova senha">
                    </div>
                </div> 
               

                <div>
                    <button type="submit" class="forgot-btn-primary">Salvar</button>
                </div>
            </form>

            <p class="forgot-footer-text">Acesse sua conta
                <a href="{{ route('login') }}" class="forgot-link">Faça login</a>
            </p>
        </div>
    </div>
@endsection
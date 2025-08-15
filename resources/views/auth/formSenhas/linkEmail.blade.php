@extends('layouts.layout')

@section('content')
    <div class="password-reset-container">
        <div class="password-reset-card">

            <div class="password-reset-icon-wrapper">
                <i class="fa-solid fa-paper-plane"></i>
            </div>

            <h1 class="password-reset-title">
                Link Enviado!
            </h1>

            <p class="password-reset-message">
                Enviamos um link para redefinição de senha para o seu endereço de e-mail. Por favor, verifique sua caixa de
                entrada.
            </p>

            <p class="password-reset-spam-note">
                Não recebeu o e-mail? Verifique sua pasta de spam ou <a href="{{ route('form.senha') }}"
                    class="password-reset-link">tente novamente</a>.
            </p>

            <div class="password-reset-footer">
                <a href="{{ route('login') }}" class="password-reset-link">
                    Voltar para o Login
                </a>
            </div>

        </div>
    </div>
@endsection
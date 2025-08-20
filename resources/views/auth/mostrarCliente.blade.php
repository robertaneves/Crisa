@extends('layouts.layout')

@section('content')

<div class="account-container">
    
    {{-- Cabeçalho da Página --}}
    <div class="account-header">
        <h1 class="account-title">Minha Conta</h1>
        <p class="account-subtitle">Gerencie suas informações e pedidos</p>
    </div>

    {{-- Grid de Cards --}}
    <div class="account-grid">

        {{-- Card: Meus Dados --}}
        <a href="{{ route('dados.cliente') }}" class="account-card">
            <i class="ph-user-circle account-card-icon"></i>
            <h5 class="account-card-title">Meus Dados</h5>
            <p class="account-card-description">Visualize e edite suas informações pessoais e de contato</p>
        </a>

        {{-- Card: Meus Pedidos --}}
        <a href="" class="account-card">
            <i class="ph-package account-card-icon"></i>
            <h5 class="account-card-title">Meus Pedidos</h5>
            <p class="account-card-description">Acompanhe o histórico e o status de todas as suas compras</p>
        </a>

        {{-- Card: Meus Endereços --}}
        <a href="{{ route('dados.endereco') }}" class="account-card">
            <i class="ph-map-pin account-card-icon"></i>
            <h5 class="account-card-title">Meus Endereços</h5>
            <p class="account-card-description">Gerencie seus endereços para agilizar futuras compras</p>
        </a>

        {{-- Card: Carteira --}}
        <a href="" class="account-card">
            <i class="ph-lock-key account-card-icon"></i>
            <h5 class="account-card-title">Carteira </h5>
            <p class="account-card-description">Informações da carteira</p>
        </a>
        
        {{-- Card: Histórico de Compra --}}
        <a href="{{-- sua-rota-aqui --}}" class="account-card">
            <i class="ph-lock-key account-card-icon"></i>
            <h5 class="account-card-title">Histórico de Compras</h5>
            <p class="account-card-description">Veja seu histórico de compras</p>
        </a>

        {{-- Card: Alterar Senha --}}
        <a href="{{ route('alterar.index') }}" class="account-card">
            <i class="ph-lock-key account-card-icon"></i>
            <h5 class="account-card-title">Alterar Senha</h5>
            <p class="account-card-description">Mantenha sua conta segura alterando sua senha regularmente.</p>
        </a>


        
    </div>
</div>
@endsection

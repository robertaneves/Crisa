@extends('layouts.layout')

@section('title', 'Finalizar Compra')

@section('content')
<div class="container mx-auto p-4 md:p-8">
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Finalizar Compra</h1>
        <p class="text-gray-500 mt-1">Revise seus dados e prossiga para o pagamento.</p>
    </div>

    <div class="bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold text-gray-700">Olá, {{ $user->name }}!</h2>
        <p class="mt-2 text-gray-600">
            Estamos quase lá! Esta é a página de checkout. O próximo passo seria integrar um gateway de pagamento.
        </p>
        
        {{-- Aqui entrará o formulário de pagamento, seleção de endereço, etc. --}}
    </div>
</div>
@endsection

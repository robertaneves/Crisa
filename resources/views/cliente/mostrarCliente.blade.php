@extends('layouts.layout')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Informações do Cliente</h2>

    <div class="border-b pb-4 mb-4">
        <h3 class="text-lg font-bold mb-2">Dados Pessoais</h3>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <strong>Nome Completo:</strong>
                {{-- <p>{{ $user->name }}</p> --}}
            </div>
            <div>
                <strong>Email:</strong>
                {{-- <p>{{ $user->email }}</p> --}}
            </div>
            <div>
                <strong>Telefone:</strong>
                {{-- <p>{{ $user->telefone }}</p> --}}
            </div>
            <div>
                <strong>CPF:</strong>
                {{-- <p>{{ $user->cpf }}</p> --}}
            </div>
        </div>
    </div>

    @if ($user->endereco)
        <div>
            <h3 class="text-lg font-bold mb-2">Dados do Endereço</h3>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <strong>Rua:</strong>
                    {{-- <p>{{ $user->endereco->rua }}</p> --}}
                </div>
                <div>
                    <strong>Número:</strong>
                    {{-- <p>{{ $user->endereco->numero }}</p> --}}
                </div>
                <div>
                    <strong>Complemento:</strong>
                    {{-- <p>{{ $user->endereco->complemento ?? 'Não informado' }}</p> --}}
                </div>
                <div>
                    <strong>Bairro:</strong>
                    {{-- <p>{{ $user->endereco->bairro }}</p> --}}
                </div>
                <div>
                    <strong>Cidade:</strong>
                    {{-- <p>{{ $user->endereco->cidade }}</p> --}}
                </div>
                <div>
                    <strong>Estado:</strong>
                    {{-- <p>{{ $user->endereco->estado }}</p> --}}
                </div>
                <div class="col-span-2">
                    <strong>CEP:</strong>
                    {{-- <p>{{ $user->endereco->cep }}</p> --}}
                </div>
            </div>
        </div>
    @else
        {{-- <div>
            <h3 class="text-lg font-bold mb-2">Dados do Endereço</h3>
            <p class="text-gray-500">Este cliente não possui um endereço cadastrado.</p>
        </div> --}}
    @endif
</div>
@endsection
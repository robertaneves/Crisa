<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller{
    
    public function layout(){
        return view('welcome');
    }

    public function criar(){
        return view('cliente.criar');
    }

    public function criarProcesso(ClienteRequest $request){
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'telefone' => $request->telefone,
                'cpf' => $request->cpf,
                'password' => $request->password,

            ]);

            $user->endereco()->create([
                'cep' => $request->cep,
                'rua' => $request->rua,
                'numero' => $request->numero,
                'complemento' => $request->complemento,
                'bairro' => $request->bairro,
                'cidade' => $request->cidade,
                'estado' => $request->estado
            ]);
            return back()->withInput()->with('success', 'Cliente cadastrado com sucesso.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Cliente não cadastrado.');
        }
    }

    // public function clientes(User $user){
    //         return view('cliente.mostrarCliente', ['user'=> $user]); 
       
    // }
    

}

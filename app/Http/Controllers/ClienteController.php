<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Categoria;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClienteController extends Controller{
    public function layout(){
        $produtos = Produto::all();
        $categorias = Categoria::all();
        return view('welcome', compact('produtos', 'categorias'));
    }

    public function criar()
    {
        $genero = ['masculino', 'feminino', 'outro'];
        return view('cliente.criar', compact('genero'));
    }

    public function criarProcesso(ClienteRequest $request)
    {
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'telefone' => $request->telefone,
                'cpf' => $request->cpf,
                'genero' => $request->genero,
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
            return redirect()->route('login')->withInput()->with('success', 'Cliente cadastrado com sucesso');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Cliente já cadastrado');
        }
    }

    public function dadosCliente()
    {
        $user = Auth::user();
        $genero = ['masculino', 'feminino', 'outro'];
        return view('cliente.dadosCliente', ['user' => $user, 'genero' => $genero]);
    }

    public function infoCliente(UpdateRequest $clienteRequest)
    {
        try {
            $user = $clienteRequest->user();

            $validatedData = $clienteRequest->validated();
            $user->fill($validatedData);
            $user->save();

            // $user->endereco()->updateOrCreate([
            //     'user_id' => $user->id], $validatedData);

            return back()->with('success', 'Informações atualizadas com sucesso!');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Ocorreu um erro ao atualizar as informações.');
        }
    }

    public function dadosEndereco()
    {
        $user = Auth::user();
        return view('cliente.endereco', ['user'=> $user]);
    }

    public function infoEndereco(UpdateRequest $updateRequest)
    {
         try {
            $user = $updateRequest->user();
            $validatedData = $updateRequest->validated();
            
            $user->endereco()->updateOrCreate(['user_id' => $user->id], $validatedData);
           
            return back()->with('success', 'Informações atualizadas com sucesso!');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Ocorreu um erro ao atualizar as informações.');
        }
    }

}

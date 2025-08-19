<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class CarrinhoController extends Controller{
    public function indexCarrinho(){
        $carrinho = session()->get('carrinho', []);
        return view('produto.carrinho', compact('carrinho'));
    }

    public function addCarrinho(Request $request, Produto $produto){
        $carrinho = session()->get('carrinho', []);
        $quantidadePedida = $request->input('quantidade', 1);

        // $imagemPrincipal = $produto->imagens()->where('principal', true)->first();
        // $imageUrl = $imagemPrincipal ? asset('storage/' . $imagemPrincipal->pasta_imagem) : 'https://placehold.co/100x120/f8f8f8/333?text=Produto';

        if (isset($carrinho[$produto->id])) {
            $carrinho[$produto->id]['quantidade'] += $quantidadePedida;
        } else {
            $carrinho[$produto->id] = [
                "nome" => $produto->name,
                "quantidade" => $quantidadePedida,
                "preco" => $produto->preco,
                // "imagem" => $imageUrl 
            ];
        }

        session()->put('carrinho', $carrinho);
        return redirect()->back()->with('success', 'Produto adicionado ao carrinho!');
    }

    public function atualizarCarrinho(Request $request, Produto $produto){
        $carrinho = session()->get('carrinho', []);

        if (isset($carrinho[$produto->id]) && $request->quantidade > 0) {
            $carrinho[$produto->id]['quantidade'] = $request->quantidade;
            session()->put('carrinho', $carrinho);

            return redirect()->back()->with('success', 'Carrinho atualizado com sucesso!');
        }
        return redirect()->back()->with('error', 'Não foi possível atualizar o carrinho.');
    }

    public function deleteCarrinho(Produto $produto){
        $chaveDoItem = 'carrinho.' . $produto->id;

        if (session()->has($chaveDoItem)) {
            session()->forget($chaveDoItem);
            return redirect()->back()->with('success', 'Produto removido do carrinho!');
        }
        return redirect()->back()->with('error', 'Produto não encontrado no carrinho para remoção.');
    }
}

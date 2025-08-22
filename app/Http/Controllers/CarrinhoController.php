<?php

// app/Http/Controllers/CarrinhoController.php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class CarrinhoController extends Controller{
    public function indexCarrinho(){
        $carrinhoDaSessao = session()->get('carrinho', []);
        $carrinhoAtualizado = [];
        $idsDosProdutos = array_keys($carrinhoDaSessao);

        if (!empty($idsDosProdutos)) {
            $produtos = Produto::with('imagens')->find($idsDosProdutos);

            foreach ($produtos as $produto) {
                if (isset($carrinhoDaSessao[$produto->id])) {
                    $imagemPrincipal = $produto->imagens->where('principal', true)->first();
                    $urlImagem = $imagemPrincipal ? asset('storage/' . $imagemPrincipal->pasta_imagem) : 'https://placehold.co/100x100?text=Sem+Imagem';

                    $carrinhoAtualizado[$produto->id] = [
                        "nome" => $produto->nome,
                        "quantidade" => $carrinhoDaSessao[$produto->id]['quantidade'],
                        "preco" => $produto->preco,
                        "imagem" => $urlImagem, 
                    ];
                }
            }
        }

        session()->put('carrinho', $carrinhoAtualizado);

        return view('produto.carrinho', ['carrinho' => $carrinhoAtualizado]);
    }

    public function addCarrinho(Request $request, $produtoId){
        $produto = Produto::with('imagens')->findOrFail($produtoId);
        $carrinho = session()->get('carrinho', []);
        $quantidadePedida = $request->input('quantidade', 1);

        $imagemPrincipal = $produto->imagens->where('principal', true)->first();
        $urlImagem = $imagemPrincipal ? asset('storage/' . $imagemPrincipal->pasta_imagem): 'https://placehold.co/100x100?text=Sem+Imagem';

        if (isset($carrinho[$produto->id])) {
            $carrinho[$produto->id]['quantidade'] += $quantidadePedida;
        } else {
            $carrinho[$produto->id] = [
                "nome" => $produto->nome,
                "quantidade" => $quantidadePedida,
                "preco" => $produto->preco,
                "imagem" => $urlImagem,
            ];
        }

        session()->put('carrinho', $carrinho);
        return redirect()->back()->with('success', 'Produto adicionado ao carrinho!');
    }

   
    public function atualizarCarrinho(Request $request, Produto $produto)
    {
        $carrinho = session()->get('carrinho', []);

        if (isset($carrinho[$produto->id]) && $request->quantidade > 0) {
            $carrinho[$produto->id]['quantidade'] = $request->quantidade;
            session()->put('carrinho', $carrinho);
            return redirect()->back()->with('success', 'Carrinho atualizado com sucesso!');
        }
        return redirect()->back()->with('error', 'Não foi possível atualizar o carrinho.');
    }

   
    public function deleteCarrinho(Produto $produto)
    {
        $carrinho = session()->get('carrinho');

        if (isset($carrinho[$produto->id])) {
            unset($carrinho[$produto->id]); 
            session()->put('carrinho', $carrinho); 
            return redirect()->back()->with('success', 'Produto removido do carrinho!');
        }

        return redirect()->back()->with('error', 'Produto não encontrado no carrinho para remoção.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller{

     /**
     * Exibe os detalhes de um produto específico.
     * @param  \App\Models\Produto  $produto O Laravel automaticamente encontra o produto pelo ID na URL.
     * @return \Illuminate\View\View
     */
    public function detalhesProduto(Produto $produto){
        return view('produto.detalhes', compact('produto'));
    }

    public function welcome(){
        $produtos = Produto::all();
        return view('welcome', compact('produtos'));
    }
}

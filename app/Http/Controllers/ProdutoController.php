<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller{
    public function detalhesProduto(Produto $produto){
        $produto->load('imagens');
        return view('produto.detalhes', compact('produto'));
    }

    public function welcome(){
        $produtos = Produto::all();
        return view('welcome', compact('produtos'));
    }
}

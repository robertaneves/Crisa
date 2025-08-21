<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProdutoRequest;
use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.layouts.layout');
    }

    public function indexProduto()
    {
        return view('admin.produto.indexProduto');
    }

    public function criarProduto()
    {
        $produto = Produto::all();
        $categorias = Categoria::all();
        $tamanhos = Produto::$tamanhosDisponiveis;
        return view('admin.produto.criarProduto', compact('produto', 'categorias', 'tamanhos'));
    }

    public function storeProduto(ProdutoRequest $request)
    {


        $dadosValidados = $request->validated();

        $produto = Produto::create([
            'nome' => $dadosValidados['nome'],
            'preco' => $dadosValidados['preco'],
            'tamanho' => $dadosValidados['tamanho'],
            'descricao' => $dadosValidados['descricao'],
            'quantidade' => $dadosValidados['quantidade'],
            'ativo' => $request->boolean('ativo'),
        ]);

        if ($request->has('categorias')) {
            $produto->categorias()->sync($request->categorias);
        }
    }
}

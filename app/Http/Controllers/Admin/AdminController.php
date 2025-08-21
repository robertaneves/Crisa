<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProdutoRequest;
use App\Models\Categoria;
use App\Models\Produto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.layouts.layout');
    }

    public function indexProduto()
    {
        $produtos = Produto::all();
        return view('admin.produto.indexProduto', compact('produtos'));
    }

    public function criarProduto()
    {
        $categorias = Categoria::all();
        $tamanhos = Produto::$tamanhosDisponiveis;
        return view('admin.produto.criarProduto', compact('produtos', 'categorias', 'tamanhos'));
    }

    public function storeProduto(ProdutoRequest $request)
    {
        try {
            $produto = new Produto();
            $produto->nome = $request->nome;
            // $produto->slug = Str::slug($request->nome);
            $produto->preco = $request->preco;
            $produto->tamanho = $request->tamanho;
            $produto->descricao = $request->descricao;
            $produto->quantidade = $request->quantidade;
            $produto->ativo = $request->boolean('ativo');

            $produto->save();

            if ($request->has('categorias')) {
                $produto->categorias()->sync($request->categorias);
            }

            return redirect()->route('index.admin.produto')->with('success', 'Produto cadastrado com sucesso');
        } catch (Exception $e) {
            dd($e->getMessage());
            return back()->withInput()->with('error', 'Produto não cadastrado');
        }
    }

}

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
        try {
            $produtos = Produto::all();
            $categorias = Categoria::all();
            $tamanhos = Produto::$tamanhosDisponiveis;
            return view('admin.produto.criarProduto', compact('produtos', 'categorias', 'tamanhos'));
        } catch (Exception $e) {
            dd($e->getMessage());
            return back()->withInput()->with('error', 'Produto não criado');
        }
    }

    public function storeProduto(ProdutoRequest $request)
    {
        DB::beginTransaction();
        try {
            $produto = new Produto();
            $produto->nome = $request->nome;
            $produto->preco = $request->preco;
            $produto->tamanho = $request->tamanho;
            $produto->descricao = $request->descricao;
            $produto->quantidade = $request->quantidade;
            $produto->ativo = $request->boolean('ativo');
            $produto->save();

            if ($request->has('categorias')) {
                $produto->categorias()->sync($request->categorias);
            }

            // 🔹 Salvar imagens
            if ($request->hasFile('imagens')) {
                foreach ($request->file('imagens') as $index => $imagem) {
                    $path = $imagem->store('produtos', 'public');
                    $produto->imagens()->create([
                        'pasta_imagem' => $path,
                        'principal' => $index === 0,
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('index.admin.produto')->with('success', 'Produto cadastrado com sucesso');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return back()->withInput()->with('error', 'Produto não cadastrado');
        }
    }


    public function editarProduto(Produto $produto)
    {
        $tamanhos = Produto::$tamanhosDisponiveis;
        $categorias = Categoria::all();
        return view('admin.produto.editarProduto', compact('produto', 'categorias', 'tamanhos'));
    }

    public function updateProduto(ProdutoRequest $request, Produto $produto)
    {
        DB::beginTransaction();
        try {
            $produto->nome = $request->nome;
            $produto->preco = $request->preco;
            $produto->tamanho = $request->tamanho;
            $produto->descricao = $request->descricao;
            $produto->quantidade = $request->quantidade;
            $produto->ativo = $request->boolean('ativo');
            $produto->save();

            if ($request->has('categorias')) {
                $produto->categorias()->sync($request->categorias);
            }

            if ($request->hasFile('imagens')) {
                foreach ($request->file('imagens') as $index => $imagem) {
                    $path = $imagem->store('produtos', 'public');
                    $produto->imagens()->create([
                        'pasta_imagem' => $path,
                        'principal' => false, 
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('index.admin.produto')->with('success', 'Produto atualizado com sucesso.');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return back()->withInput()->with('error', 'Produto não atualizado.');
        }
    }

    public function deleteProduto(Produto $produto)
    {
        try {
            $produto->delete();
            return redirect()->route('index.admin.produto')->with('success', 'Produto deletado com sucesso.');
        } catch (Exception $e) {
            dd($e->getMessage());
            return back()->withInput()->with('error', 'Produto não atualizado.');
        }
    }
}

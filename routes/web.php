<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SenhaController;
use App\Http\Controllers\SobreNosController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ClienteController::class, 'layout'])->name('layout');
Route::get('/sobreNos', [SobreNosController::class, 'sobreNos'])->name('sobre.nos');
Route::get('/produto/{produto}', [ProdutoController::class, 'detalhesProduto'])->name('detalhes.produto');

// PROCESSO DE LOGIN E CADASTRO
Route::get('/criar', [ClienteController::class, 'criar'])->name('criar');
Route::post('/criar', [ClienteController::class, 'criarProcesso'])->name('criar.processo');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginProccesso'])->name('login.proccesso');

// MUDANÇA DE SENHA
Route::get('/formSenha', [SenhaController::class, 'formSenha'])->name('form.senha'); // FORMULÁRIO DE ENVIO DE INFORMAÇÕES
Route::post('/formSenha', [SenhaController::class, 'senhaProcesso'])->name('senha.processo'); // ENVIO DE EMAIL(LINK) PARA ATUALIZAR SENHA
Route::get('/linkSenha/{token}', [SenhaController::class, 'linkSenha'])->name('password.reset'); // FORMULÁRIO PARA ATUALIZAR SENHA
Route::post('/linkSenha', [SenhaController::class, 'linkProcesso'])->name('link.processo'); // ATUALIZAÇÃO DA NOVA SENHA

Route::get('/linkEmail', [SenhaController::class, 'linkEmail'])->name('link.email');
Route::post('/linkEmail', [SenhaController::class, 'linkEnviarEmail']);


// Rotas Protegidas (Exigem que o usuário esteja logado)
Route::middleware('auth')->group(function() {
    Route::get('/mostrarCliente', [AuthController::class, 'mostrarCliente'])->name('mostrar.cliente');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // INFORMAÇÕES DO CLIENTE (DADOS, PEDIDOS, ENDEREÇOS, CARTEIRA, HISTÓRICO E ALTERAR SENHA)
    Route::get('/dadosClientes', [ClienteController::class, 'dadosCliente'])->name('dados.cliente'); 
    Route::put('/dadosClientes', [ClienteController::class, 'infoCliente'])->name('info.cliente');
    
    Route::get('/alterarSenha', [SenhaController::class, 'alterarIndex'])->name('alterar.index');
    Route::put('/alterarSenha', [SenhaController::class, 'alterarSenha'])->name('alterar.senha');


    Route::get('/enderecoClientes', [ClienteController::class, 'dadosEndereco'])->name('dados.endereco');
    Route::put('/enderecoClientes', [ClienteController::class, 'infoEndereco'])->name('info.endereco');

    Route::get('/checkout', [CheckoutController::class, 'indexCheckout'])->middleware('auth')->name('index.checkout');
});

// Rotas do Carrinho (Podem ser acessadas por visitantes e logados)
Route::get('/carrinho', [CarrinhoController::class, 'indexCarrinho'])->name('index.carrinho');
Route::post('/carrinho/adicionar/{produto}', [CarrinhoController::class, 'addCarrinho'])->name('add.carrinho');
Route::patch('/carrinho/atualizar/{produto}', [CarrinhoController::class, 'atualizarCarrinho'])->name('atualizar.carrinho');
Route::delete('/carrinho/remover/{produto}', [CarrinhoController::class, 'deleteCarrinho'])->name('delete.carrinho');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function(){
    Route::get('/admin', [AdminController::class, 'layout']);
    Route::get('/index', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/indexProduto', [AdminController::class, 'indexProduto'])->name('index.admin.produto');

    Route::get('/criarProduto', [AdminController::class, 'criarProduto'])->name('criar.admin.produto');
    Route::post('/criarProduto', [AdminController::class, 'storeProduto'])->name('store.admin.produto');

    Route::get('/editarProduto/{produto}', [AdminController::class, 'editarProduto'])->name('editar.admin.produto');
    Route::put('/editarProduto/{produto}', [AdminController::class, 'updateProduto'])->name('update.admin.produto');
    Route::delete('/deleteProduto/{produto}', [AdminController::class, 'deleteProduto'])->name('delete.admin.produto');
});
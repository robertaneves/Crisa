<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\SenhaController;
use App\Http\Controllers\sobreNosController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ClienteController::class, 'layout'])->name('layout');
Route::get('/sobreNos', [sobreNosController::class, 'sobreNos'])->name('sobre.nos');

Route::get('/linkEmail', [senhaController::class, 'linkEmail'])->name('link.email');
Route::post('/linkEmail', [senhaController::class, 'linkEnviarEmail']);

// CRIAÇÃO DE CLIENTE
Route::get('/criar', [ClienteController::class, 'criar'])->name('criar');
Route::post('/criar', [ClienteController::class, 'criarProcesso'])->name('criar.processo');

// LOGIN/LOGOUT DO CLIENTE
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginProccesso'])->name('login.proccesso');
// Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/mostrarCliente', [AuthController::class, 'mostrarCliente'])->name('mostrar.cliente');

// MUDANÇA DE SENHA
Route::get('/formSenha', [SenhaController::class, 'formSenha'])->name('form.senha'); // FORMULÁRIO DE ENVIO DE INFORMAÇÕES
Route::post('/formSenha', [SenhaController::class, 'senhaProcesso'])->name('senha.processo'); // ENVIO DE EMAIL(LINK) PARA ATUALIZAR SENHA
Route::get('/linkSenha/{token}', [SenhaController::class, 'linkSenha'])->name('password.reset'); // FORMULÁRIO PARA ATUALIZAR SENHA
Route::post('/linkSenha', [SenhaController::class, 'linkProcesso'])->name('link.processo'); // ATUALIZAÇÃO DA NOVA SENHA

// INFORMAÇÕES DO CLIENTE (DADOS, PEDIDOS, ENDEREÇOS, CARTEIRA, HISTÓRICO E ALTERAR SENHA)
Route::get('/dadosClientes', [ClienteController::class, 'dadosCliente'])->name('dados.cliente');
Route::put('/dadosClientes', [ClienteController::class, 'infoCliente'])->name('info.cliente');

Route::get('/enderecoClientes', [ClienteController::class, 'dadosEndereco'])->name('dados.endereco');
Route::put('/enderecoClientes', [ClienteController::class, 'infoEndereco'])->name('info.endereco');

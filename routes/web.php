<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\SenhaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ClienteController::class, 'layout'])->name('layout');

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

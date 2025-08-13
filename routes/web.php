<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\SenhaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ClienteController::class, 'layout'])->name('layout');

// CRIAÇÃO DE CLIENTE
Route::get('/criar', [ClienteController::class, 'criar'])->name('criar');
Route::post('/criar', [ClienteController::class, 'criarProcesso'])->name('criar.processo');

// LOGIN DO CLIENTE
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginProccess'])->name('login.proccess');
// Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// MUDANÇA DE SENHA
Route::get('/formSenha', [SenhaController::class, 'formSenha'])->name('form.senha'); // FORMULÁRIO DE ENVIO DE INFORMAÇÕES
Route::post('/formSenha', [SenhaController::class, 'senhaProcesso'])->name('senha.processo'); // ENVIO DE EMAIL(LINK) PARA ATUALIZAR SENHA
Route::get('/linkSenha', [SenhaController::class, 'linkSenha'])->name('link.senha'); // FORMULÁRIO PARA ATUALIZAR SENHA
Route::post('/linkSenha', [SenhaController::class, 'linkProcesso'])->name('link.processo'); // ATUALIZAÇÃO DA NOVA SENHA


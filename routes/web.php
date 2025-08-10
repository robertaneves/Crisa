<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ClienteController::class, 'layout'])->name('layout');

Route::get('/criar', [ClienteController::class, 'criar'])->name('criar');
Route::post('/criar', [ClienteController::class, 'criarProcesso'])->name('criar.processo');

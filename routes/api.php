<?php

use App\Http\Controllers\ServicoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/




//DELETAR SERVIÇO
Route::delete('delete/{id}',[ServicoController::class, 'excluir']);


//CADASTRAR SERVIÇP
Route::post('cadastrar', [ServicoController::class,  'servico']);




//BUSCAR POR NOME
Route::get('buscar/{nome}', [ServicoController::class, 'PesquisarPorNome']);

//ATUALIZAR O SERVIÇO
Route::put('update', [ServicoController::class,  'update']);
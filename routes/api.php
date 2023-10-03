<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\ProfissionalController;

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


//CADASTRO DE SERVIÇO:

//DELETAR SERVIÇO
Route::delete('delete/{id}', [ServicoController::class, 'excluir']);


//CADASTRAR SERVIÇP
Route::post('cadastrar', [ServicoController::class,  'servico']);




//BUSCAR POR SERVIÇO
Route::get('buscar/{nome}', [ServicoController::class, 'PesquisarPorNome']);


//BUSCAR POR DESCRICAO
Route::get('pesquisar/{descricao}', [ServicoController::class, 'pesquisarPorDescricao']);

//ATUALIZAR O SERVIÇO
Route::put('update', [ServicoController::class,  'update']);



//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//CADASTRO DE CLIENTES:

//DELETAR CLIENTE
Route::delete('excluir/{id}', [ClienteController::class, 'deletar']);


//CADASTRAR CLIENTE
Route::post('cadastro', [ClienteController::class,  'castroCliente']);

//BUSCAR POR CLIENTE
Route::get('cliente/{nome}', [ClienteController::class, 'pesquisarPorCliente']);


//BUSCAR POR CPF
Route::get('CPF/{cpf}', [ClienteController::class, 'pesquisarPorCpf']);

//BUSCAR POR CELULAR
Route::get('telefone/{celular}', [ClienteController::class, 'PesquisarPorCelular']);


//BUSCAR POR EMAIL
Route::get('email/{descricao}', [ClienteController::class, 'PesquisarPorEmail']);


//BUSCAR POR CEP
Route::get('cep/{cep}', [ClienteController::class, 'pesquisarPorCep']);



//ATUALIZAR FICHA DE CLIENTE
Route::put('ataulizarCliente', [ClienteController::class,  'updateCliente']);






//PROFISSIONAL:


//CADASTROD DE PROFISSIONAL

Route::post('cadastroProfissional',[ProfissionalController::class,'cadastroProfissional']);

//Route::get('pesquisarPorProfissional/{nome}',[ControllersProfissionalcontroller::class,' cadastroProfissional']);




//CADASTROD DE agendamento

Route::post('cadastroAgenda',[AgendaController::class,'cadastroClienteAgenda']);

Route::put('atualizarA/{id}', [AgendaController::class,  'updateAgendamento']);

Route::delete('deleteAgendamento/{id}', [AgendaController::class, 'excluir']);
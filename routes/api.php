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

Route::delete('delete/{id}', [ServicoController::class, 'excluir']);
Route::post('cadastrar', [ServicoController::class,  'servico']);
Route::get('buscar/{nome}', [ServicoController::class, 'PesquisarPorNome']);
Route::get('pesquisar/{descricao}', [ServicoController::class, 'pesquisarPorDescricao']);
Route::put('update', [ServicoController::class,  'update']);

//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//CADASTRO DE CLIENTES:


Route::delete('excluir/{id}', [ClienteController::class, 'deletar']);
Route::post('cadastro', [ClienteController::class,  'castroCliente']);
Route::get('cliente/{nome}', [ClienteController::class, 'pesquisarPorCliente']);
Route::get('CPF/{cpf}', [ClienteController::class, 'pesquisarPorCpf']);
Route::get('telefone/{celular}', [ClienteController::class, 'PesquisarPorCelular']);
Route::get('email/{descricao}', [ClienteController::class, 'PesquisarPorEmail']);
Route::get('cep/{cep}', [ClienteController::class, 'pesquisarPorCep']);
Route::put('ataulizarCliente', [ClienteController::class,  'updateCliente']);


//PROFISSIONAL:



Route::post('cadastroProfissional', [ProfissionalController::class, 'cadastroProfissional']);

//Route::get('pesquisarPorProfissional/{nome}',[ControllersProfissionalcontroller::class,' cadastroProfissional']);




//CADASTROD DE agendamento

Route::post('cadastroAgenda', [AgendaController::class, 'cadastroClienteAgenda']);

Route::put('atualizarA/{id}', [AgendaController::class,  'updateAgendamento']);

Route::delete('deleteAgendamento/{id}', [AgendaController::class, 'excluir']);

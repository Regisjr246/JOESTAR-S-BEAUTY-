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
Route::post('cadastrarServico', [ServicoController::class,  'servico']);
Route::post('buscarNome', [ServicoController::class, 'PesquisarPorNome']);
Route::get('pesquisar/{descricao}', [ServicoController::class, 'pesquisarPorDescricao']);
Route::put('update', [ServicoController::class,  'update']);
Route::get('visualizarServico', [ServicoController::class, 'visualizarServico']);
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//CADASTRO DE CLIENTES:


Route::delete('excluir/{id}', [ClienteController::class, 'deletar']);
Route::post('cadastroCliente', [ClienteController::class,  'cadastroCliente']);
Route::post('cliente', [ClienteController::class, 'pesquisarPorCliente']);
Route::post('CPF', [ClienteController::class, 'pesquisarPorCpf']);
Route::post('telefone', [ClienteController::class, 'PesquisarPorCelular']);
Route::post('email', [ClienteController::class, 'PesquisarPorEmail']);
Route::post('cep', [ClienteController::class, 'pesquisarPorCep']);
Route::put('ataulizarCliente', [ClienteController::class,  'updateCliente']);
Route::get('visualizarCadastroCliente', [ClienteController::class, 'visualizarCadastroCliente']);

//PROFISSIONAL:



Route::post('cadastroProfissional', [ProfissionalController::class, 'cadastroProfissional']);



Route::post('pesquisarPorProfissional', [ProfissionalController::class, 'pesquisarPorProfissionalNome']);

Route::get('vizualizarProfi', [ProfissionalController::class, 'visualizarProfissional']);

//CADASTROD DE agendamento

Route::post('cadastroAgenda', [AgendaController::class, 'cadastroClienteAgenda']);

Route::put('atualizarA/{id}', [AgendaController::class,  'updateAgendamento']);

Route::delete('deleteAgendamento/{id}', [AgendaController::class, 'excluir']);

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteFormRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{



    //CADASTRO DE CLIENTE


    public function castroCliente(ClienteFormRequest $request)
    {

        $cliente = Cliente::create([
            'nome' => $request->nome,
            'celular' => $request->celular,
            'email' => $request->email,
            'cpf' => $request->cpg,
            'dataNascimento' => $request->dataNascimento,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'pais' => $request->pais,
            'rua' => $request->rua,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'cep' => $request->cep,
            'complemento' => $request->completo,
            'senha' => $request->senha
        ]);
        return response()->json([
            "success" => true,
            "message" => "Cliente cadastrado com sucesso",
            "data" => $cliente
        ], 200);
    }



    //PESQUISA POR NOME

    public function PesquisarPorNome(Request $request)
    {


        $cliente = Cliente::where('nome', 'like', '%' . $request->nome . '%')->get();


        if (count($cliente)) {

            return response()->json([
                'status' => true,
                'data' => $cliente
            ]);
        }


        return response()->json([
            'status' => false,
            'data' => "Cliente não encontrado"
        ]);
    }


    //PESQUISA POR CPF
    public function pesquisarPorCpf(Request $request)
    {


        $cliente = Cliente::where('cpf', 'like', '%' . $request->cpf . '%')->get();

        if (count($cliente) > 0) {
            return response()->json([
                'status' => true,
                'data' => $cliente
            ]);
        }


        return response()->json([
            'status' => false,
            'data+' => "Cpf não encontrado"
        ]);
    }


    //PESQUISA POR CELULAR
    public function PesquisarPorCelular(Request $request)
    {


        $cliente = Cliente::where('celular', 'like', '%' . $request->celular . '%')->get();

        if (count($cliente) > 0) {
            return response()->json([
                'status' => true,
                'data' => $cliente
            ]);
        }


        return response()->json([
            'status' => false,
            'data+' => "Celular não encontrado"
        ]);
    }


    //PESQUISA POR E-MAIL
    public function PesquisarPorEmail(Request $request)
    {


        $cliente = Cliente::where('email', 'like', '%' . $request->email . '%')->get();

        if (count($cliente) > 0) {
            return response()->json([
                'status' => true,
                'data' => $cliente
            ]);
        }


        return response()->json([
            'status' => false,
            'data+' => "E-mail não encontrado"
        ]);
    }


    //PESQUISA POR CEP
    public function PesquisarPorCep(Request $request)
    {


        $cliente = Cliente::where('cep', 'like', '%' . $request->cep . '%')->get();

        if (count($cliente) > 0) {
            return response()->json([
                'status' => true,
                'data' => $cliente
            ]);
        }


        return response()->json([
            'status' => false,
            'data+' => "Cep não encontrado"
        ]);
    }
}

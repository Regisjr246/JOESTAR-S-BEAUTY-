<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteFormRequest;
use App\Http\Requests\ClienteFormRequestUpdate;
use App\Http\Requests\ServicoFormRequestUpdate;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{



    //CADASTRO DE CLIENTE


    public function cadastroCliente(ClienteFormRequest $request)
    {

        $cliente = Cliente::create([
            'nome' => $request->nome,
            'celular' => $request->celular,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'dataNascimento' => $request->dataNascimento,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'pais' => $request->pais,
            'rua' => $request->rua,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'cep' => $request->cep,
            'complemento' => $request->complemento,
            'password' => Hash::make( $request->password)
        ]);
        return response()->json([
            "success" => true,
            "message" => "Cliente cadastrado com sucesso",
            "data" => $cliente
        ], 200);
    }



    //PESQUISA POR NOME

    public function pesquisarPorCliente(Request $request)
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
            'data' => "Cpf não encontrado"
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
            'data' => "Celular não encontrado"
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
            'data' => "E-mail não encontrado"
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
            'data' => "Cep não encontrado"
        ]);
    }



 //ATUALIZAÇÃO DE CLIENTE



 public function updateCliente(ClienteFormRequestUpdate $request)
 {


     $cliente= Cliente::find($request->id);

     if (!isset($cliente)) {
         return response()->json([
             'status' => false,
             'message' => 'Serviço não encontrado'
         ]);
     }


     if (isset($request->nome)) {
         $cliente->nome = $request->nome;
     }

     if (isset($request->email)) {
         $cliente->email = $request->email;
     }

     if (isset($request->cpf)) {
         $cliente->cpf = $request->cpf;
     }

     if (isset($request->senha)) {
         $cliente->senha = $request->senha;
     }

     if (isset($request->dataNascimento)) {
        $cliente->sdataNascimento = $request->sdataNascimento;
    }

    if (isset($request->cep)) {
        $cliente->cep = $request->cep;
    }


    if (isset($request->celular)) {
        $cliente->celular = $request->celular;
    }

    if (isset($request->numero)) {
        $cliente->numero = $request->numero;
    }
    if (isset($request->estado)) {
        $cliente->estado = $request->estado;
    }



    if (isset($request->cidade)) {
        $cliente->cidade = $request->cidade;
    }


    if (isset($request->complemento)) {
        $cliente->complemento = $request->complemento;
    }


    if (isset($request->bairro)) {
        $cliente->bairro = $request->bairro;
    }

    if (isset($request->rua)) {
        $cliente->rua = $request->rua;
    }

    if (isset($request->numero)) {
        $cliente->numero = $request->numero;

     $cliente->update();

     return response()->json([
         'status' => true,
         'message' => 'Serviço ataulizado'
     ]);
 }
}


 //FUNÇÃO DE EXCLUIR

 public function deletar($cliente)
 {
     $cliente = Cliente::find($cliente);

     if (!isset($cliente)) {
         return response()->json([
             'status' => false,
             'message' => "Usuário não encontrado"
         ]);
     }

     $cliente->delete();

     return response()->json(([
         'status' => true,
         'message' =>  "Serviço excluido com sucesso"
     ]));
 }








 
 public function visualizarCadastroCliente()
 {
     $cliente = Cliente::all();

     if (!isset($cliente)) {

         return response()->json([
             'status' => false,
             'message' => 'não há registros registrados'
         ]);
     }
     return response()->json([
         'status' => true,
         'data' => $cliente
     ]);
 }




}

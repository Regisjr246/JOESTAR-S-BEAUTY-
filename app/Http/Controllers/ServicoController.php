<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicoFormRequest;
use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    public function servico(ServicoFormRequest $request)
    {


        $servico = Servico::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'duracao' => $request->duracao,
            'preco' => $request->preco,

        ]);

        return response()->json([
            "success" => true,
            "message" =>  "Serviço cadastrado com sucesso",
            "data" => $servico
        ], 200);
    }



    //PESQUISA POR NOME
    public function PesquisarPorNome(Request $request)
    {
        $servico = Servico::where('nome', 'like', '%' . $request->nome . '%')->get();

        if (count($servico)) {
            return response()->json([
                'status' => true,
                'data' => $servico

            ]);
        }

        return response()->json([
            'status' => false,
            'data' => "Nome não encontrada"
        ]);
    }




    //PESQUISA POR SERVIÇO !!!!(id)!!!!


    public function pesquisaPorId($id)
    {


        $servico = Servico::find($id);

        if ($servico == null) {
            return response()->json([
                'status' => false,
                'message' => "Serviço não encontrado"
            ]);
        }


        return response()->json([

            'status' => true,
            'data' => $servico
        ]);
    }









    //ATUALIZAÇÃO DE FICHA 



    public function update(Request $request)
    {


        $servico = Servico::find($request->id);

        if (!isset($servico)) {
            return response()->json([
                'status' => false,
                'message' => 'Serviço não encontrado'
            ]);
        }


        if (isset($request->nome)) {
            $servico->nome = $request->nome;
        }

        if (isset($request->descricao)) {
            $servico->descricao = $request->descricao;
        }

        if (isset($request->duracao)) {
            $servico->duracao = $request->duracao;
        }

        if (isset($request->preco)) {
            $servico->preco = $request->preco;
        }

        $servico->update();

        return response()->json([
            'status' => true,
            'message' => 'Serviço ataulizado'
        ]);
    }

    //FUNÇÃO DE EXCLUIR

    public function excluir($servico)
    {
        $servico = Servico::find($servico);

        if (!isset($servico)) {
            return response()->josn([
                'status' => false,
                'message' => "Usuário não encontrado"
            ]);
        }

        $servico->delete();

        return response()->json(([
            'status' => true,
            'message' =>  "Serviço excluido com sucesso"
        ]));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgendaFormRequest;
use App\Http\Requests\AgendaFormRequestUpdate;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    // AGENDA, CADASTRO DE CLIENTE:


    public function cadastroClienteAgenda(AgendaFormRequest $request)
    {

        $cliente = Agenda::create([
            'cliente' => $request->cliente,
            ' profissional' => $request->profissional,
            'data' => $request->data,
            'hora' => $request->hora,
            'servico' => $request->servico,
            'formaDePagamento' => $request->formaDePagamento
        ]);
    }


    //VISUALIZAÇÃO DE SERVIÇO


    public function VisualisarServico(Request $request)
    {


        $cliente = Agenda::where('servico', 'like', '%' . $request->servico . '%')->get();

        if (count($cliente) > 0) {
            return response()->json([
                'status' => true,
                'data' => $cliente
            ]);
        }


        return response()->json([
            'status' => false,
            'data' => "Servico não encontrado"
        ]);
    }


    //EDITANDO O AGENDAMENTO

    public function updateProfissional(AgendaFormRequestUpdate $request)
    {


        $cliente = Agenda::find($request->id);

        if (!isset($cliente)) {
            return response()->json([
                'status' => false,
                'message' => 'Serviço não encontrado'
            ]);
        }


        if (isset($request->cliente)) {
            $cliente->cliente = $request->cliente;
        }

        if (isset($request->profissional)) {
            $cliente->profissional = $request->profissional;
        }



        if (isset($request->data)) {
            $cliente->data = $request->data;
        }



        if (isset($request->hora)) {
            $cliente->hora = $request->hora;
        }


        if (isset($request->servico)) {
            $cliente->servico = $request->servico;
        }


        if (isset($request->formaDePagamento)) {
            $cliente->formaDePagamento = $request->formaDePagamento;
        }

        $cliente->update();

        return response()->json([
            'status' => true,
            'message' => 'Serviço ataulizado'
        ]);
    }



    //DELETANDO AGENDAMENTO forma 1

    public function excluir($cliente)
    {
        $profissional = Agenda::find($cliente);

        if (!isset($cliente)) {
            return response()->json([
                'status' => false,
                'message' => "Agendamento não encontrado"
            ]);
        }

        $profissional->delete();

        return response()->json(([
            'status' => true,
            'message' =>  "Serviço excluido com sucesso"
        ]));
    }




    //DELETANDO AGENDAMENTO FORMA 2

    public function excluir2($request, $cliente)
    {
        $profissional = Agenda::find($cliente);

        if (!isset($cliente)) {
            return response()->json([
                'status' => false,
                'message' => "Agendamento não encontrado"
            ]);
        }

        if (isset($request->cliente)) {
            $cliente->cliente = $request->cliente;
        }

        if (isset($request->profissional)) {
            $cliente->profissional = $request->profissional;
        }



        if (isset($request->data)) {
            $cliente->data = $request->data;
        }



        if (isset($request->hora)) {
            $cliente->hora = $request->hora;
        }


        if (isset($request->servico)) {
            $cliente->servico = $request->servico;
        }


        if (isset($request->formaDePagamento)) {
            $cliente->formaDePagamento = $request->formaDePagamento;




            $profissional->delete();

            return response()->json(([
                'status' => true,
                'message' =>  "Agendamento excluido com sucesso"
            ]));
        }
    }
}

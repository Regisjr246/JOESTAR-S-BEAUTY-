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
        $agendas = Agenda::create([
            'cliente_id' => $request->cliente_id,
            'profissional_id' => $request->profissional_id,
            'valor'=>$request->valor,
            'data_hora' => $request->data_hora,
            'servico_id' => $request->servico_id,
            'tipo_pagamento' => $request->tipo_pagamento
        ]);
        return response()->json([
            "success" => true,
            "message" => "Agendamento cadastrado com sucesso",
            "data" => $agendas
        ], 200);
    }


    //VISUALIZAÇÃO DE SERVIÇO


    public function VisualisarServico(Request $request)
    {


        $agendas = Agenda::where('servico', 'like', '%' . $request->servico . '%')->get();

        if (count($agendas) > 0) {
            return response()->json([
                'status' => true,
                'data' => $agendas
            ]);
        }


        return response()->json([
            'status' => false,
            'data' => "Servico não encontrado"
        ]);
    }


    //EDITANDO O AGENDAMENTO

    public function updateAgendamento(AgendaFormRequest $request)
    {


        $agendas = Agenda::find($request->id);

        if (!isset($agendas)) {
            return response()->json([
                'status' => false,
                'message' => 'Serviço não encontrado'
            ]);
        }


        if (isset($request->agenda)) {
            $agendas->cliente_id = $request->cliente_id;
        }

        if (isset($request->profissional_id)) {
            $agendas->profissional_id = $request->profissional_id;
        }



        if (isset($request->data_hora)) {
            $agendas->data_hora = $request->data_hora;
        }



        if (isset($request->valor)) {
            $agendas->valor = $request->valor;
        }


        if (isset($request->servico_id)) {
            $agendas->servico_id = $request->servico_id;
        }


        if (isset($request->tipo_pagamento)) {
            $agendas->tipo_pagamento = $request->tipo_pagamento;
        }

        $agendas->update();

        return response()->json([
            'status' => true,
            'message' => 'Serviço ataulizado'
        ]);
    }



    //DELETANDO AGENDAMENTO 

    public function excluir($id){
        $agendas= Agenda::find($id);
        if (!isset($agendas)) {
            return response()->json([
                'status' => false,
                'message' => "Agendamento não encontrado"
            ]);
        }

        $agendas->delete();

        return response()->json(([
            'status' => true,
            'message' =>  "Agendamento excluido com sucesso"
        ]));
    }





}

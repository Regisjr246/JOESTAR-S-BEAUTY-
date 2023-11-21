<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgendaFormRequest;
use App\Http\Requests\AgendaFormRequestUpdate;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    // AGENDA, :


    public function cadastroAgenda(AgendaFormRequest $request)
    {
        $agendas =Agenda::create([
           
            'profissional_id' => $request->profissional_id,
            
            'dataHora' => $request->dataHora
            
        ]);
        return response()->json([
            "success" => true,
            "message" => "Agenda cadastrado com sucesso",
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

    public function updateAgenda(AgendaFormRequestUpdate $request)
    {


        $agendas = Agenda::find($request->id);

        if (!isset($agendas)) {
            return response()->json([
                'status' => false,
                'message' => 'Agenda não encontrado'
            ]);
        }


       

        if (isset($request->profissional_id)) {
            $agendas->profissional_id = $request->profissional_id;
        }



        if (isset($request->data_hora)) {
            $agendas->data_hora = $request->data_hora;
        }



        $agendas->update();

        return response()->json([
            'status' => true,
            'message' => 'Agenda ataulizado'
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







    public function visualizarAgenda()
    {
        $agendas= Agenda::all();
   
        if (!isset($agendas)) {
   
            return response()->json([
                'status' => false,
                'message' => 'não há registros registrados'
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $agendas
        ]);
    }








}

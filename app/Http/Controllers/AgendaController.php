<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgendaFormRequest;
use App\Http\Requests\AgendaFormRequestUpdate;
use App\Models\Agenda;
use App\Models\Profissional;
use Illuminate\Http\Request;

use DateTime;

class AgendaController extends Controller
{
    // AGENDA, :


    public function cadastroAgenda(AgendaFormRequest $request)
    {



        $dataHoraAgendamento = new DateTime($request->dataHora);
        $dataAtual = new DateTime('now');

        if ($dataHoraAgendamento < $dataAtual) {
            return response()->json([
                "success" => false,
                "message" => "Não é possível cadastrar um horário antes do dia atual"
            ], 400);
        }




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




    
    




    //VISUALIZAÇÃO DE por data


    public function buscarPorData(Request $request)
    {


        $agendas = Agenda::where('datahORA', 'like', '%' . $request->dataHora . '%')->get();

        if (count($agendas) > 0) {
            return response()->json([
                'status' => true,
                'data' => $agendas
            ]);
        }


        return response()->json([
            'status' => false,
            'data' => "Data não encontrado"
        ]);
    }















//EDITANDO O AGENDAMENTO
public function update(AgendaFormRequestUpdate $request){
    $agendamento = Agenda::find($request->id);




    $dataHoraAgendamento = new DateTime($request->dataHora);
    $dataAtual = new DateTime('now');

    if ($dataHoraAgendamento < $dataAtual) {
        return response()->json([
            "success" => false,
            "message" => "Não é possível cadastrar um horário antes do dia atual"
        ], 400);
    }




    if(!isset($agendamento)){
        return response()->json([
            "status" => false,
            "message" => "Agendamento não encontrado"
        ]);
    }
$profissional=Profissional::find($request->profissional_id);
if(!isset($profissional)){return response()->json([
    "status" => false,
    "message" => "Profissional não encontrado"
]);}
    if(isset($profissional)){
        $agendamento->profissional_id = $request->profissional_id;
    }
    if(isset($request->dataHora)){
        $agendamento->dataHora = $request->dataHora;
    }
    $agendamento->update();

    return response()->json([
        "status" => true,
        "message" => "agendamento atualizado"
    ]) ;
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
            $agendas->dataHora = $request->data_hora;
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













    public function pesquisarPorId($id){
        $agendamento = Agenda::find($id);
        if($agendamento == null){
            return response()->json([
                'status'=> false,
                'message' => "agendamento não encontrado"
            ]);     
        }
        return response()->json([
            'status'=> true,
            'data'=> $agendamento
        ]);
    }



}

<?php

namespace App\Http\Controllers\DashboardAluno;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\atendimento\Atendimento;

class AtendimentoController extends Controller
{

    public static function salvarAtendimento(Request $request){
        
        $this->validate($request,[
            'status'     => 'require|in:ocorrido,nao_ocorrido,cancelado',
            'id_aluno'   => 'required|exists:aluno,id',
            'id_horario' => 'required|exists:horario_semana,id'
        ]);

        $atendimento = [
            'id_aluno'       => $request->get('id_aluno'),
            'id_horario'     => $request->get('id_horario'),
            'status'         => 'não_ocorrido',
            'motivo'         => $request->get('motivo'),
            'encaminhamento' => $request->get('encaminhamento')
        ];

        $confirmação = Atendimento::create($atendimento);
        
        return $confirmação;
    }

    public static function mostrarAtendimentos(Request $request,$id){
        return response(Atendimento::select('id','id_aluno','id_horario','status')->where('id_aluno','=',$id)->get(),200)->header('Content-Type','text/json');
    }
    
}
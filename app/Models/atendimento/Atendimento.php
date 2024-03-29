<?php

namespace App\Models\atendimento;

use App\Models\aluno\Aluno;
use App\Models\funcionario\Funcionario;
use App\Models\horarios\HorarioSemana;
use App\Models\observacao\ObservacaoAtendimento;
use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model
{
    protected $table 	    = 'atendimento';
    protected $primaryKey 	= 'id';
    public $timestamps = false;

    public static function create(array $data){
        $atendimento = new Atendimento();
        $atendimento->id_aluno       = $data['id_aluno'];
        $atendimento->id_horario     = $data['id_horario'];
        $atendimento->id_psicologo   = $data['id_psicologo'];
        $atendimento->status         = $data['status'];
        $atendimento->motivo         = $data['motivo'];
        $atendimento->encaminhamento = $data['encaminhamento'];
        $atendimento->save();

        return $atendimento;
    }

    public function aluno()
    {
        return $this->belongsTo(Aluno::class, 'id_aluno');
    }

    public function observacoes()
    {
        return $this->hasMany(ObservacaoAtendimento::class, 'id', 'id_atendimento');
    }

    public function psicologo()
    {
        return $this->hasOne(Funcionario::class, 'id', 'id_psicologo');
    }

    public function horario()
    {
        return $this->hasOne(HorarioSemana::class, 'id', 'id_horario');
    }
}
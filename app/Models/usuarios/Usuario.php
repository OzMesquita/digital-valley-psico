<?php

namespace App\Models\usuarios;


use App\Models\contato\Contato;
use App\Models\endereco\Endereco;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;

use App\Models\aluno\Aluno;

class Usuario extends Authenticatable
{
    use Notifiable;
    use CanResetPassword;

    protected $table = 'usuario';
    protected $primaryKey = 'id';

    protected $hidden = [
        'remember_token', 'id_endereco'
    ];

    public static function create(array $data)
    {
        $usuario = new Usuario();
        $usuario->nome_completo = $data['nome_completo'];
        $usuario->data_nascimento = $data['data_nascimento'];
        $usuario->genero = $data['genero'];
        $usuario->tipo = $data['tipo'];
        $usuario->id_endereco = $data['id_endereco'];

        $usuario->save();

        return $usuario;
    }

    public function endereco()
    {
        return $this->hasOne(Endereco::class, 'id', 'id_endereco');
    }

    public function contatos()
    {
        return $this->hasMany(Contato::class, 'id_usuario', 'id');
    }

    public function aluno()
    {
        return $this->hasOne(Aluno::class, 'id_usuario');
    }
}

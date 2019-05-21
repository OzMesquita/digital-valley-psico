<?php

namespace App\Models\endereco;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
	protected $table 		= 'endereco';
    protected $primaryKey 	= 'id';

	public $timestamps = false;

    public static function create(array $data){
        $endereco = new Endereco();
        $endereco->endereco     = $data['endereco'];
        $endereco->numero       = $data['numero'];
        $endereco->bairro       = $data['bairro'];
        $endereco->id_cidade    = $data['id_cidade'];
        $endereco->save();

        return $endereco;
    }
    
    public function cidade(){
        return $this->hasOne('App\Models\localizacao\Cidade', 'id', 'id_cidade');
    }

}

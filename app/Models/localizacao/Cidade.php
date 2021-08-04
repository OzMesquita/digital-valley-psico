<?php

namespace App\Models\localizacao;

use App\Models\endereco\Endereco;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $table 		= 'cidade';
	protected $primaryKey 	= 'id';

	public $timestamps = false;
		
	protected $filliable = [
		
	];
	
	protected $hidden = [
		
	];

	public function estado(){
		return $this->belongsTo(Estado::class, 'state_id' , 'id');
	}
	public function endereco(){
		return $this->belongsTo(Endereco::class, 'id_cidade' , 'id');
	}
}

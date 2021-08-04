<?php

namespace App\Models\localizacao;

use Illuminate\Database\Eloquent\Model;
use App\Models\localizacao\Cidade;

class Estado extends Model
{
    protected $table 		= 'estado';
	protected $primaryKey 	= 'id';

	public $timestamps = false;
	
	protected $hidden = [
		
	];

	public function cidades(){
		return $this->hasMany(Cidade::class, 'state_id', 'id');
	}

	public function pais(){
	    return $this->belongsTo(Pais::class, 'id', 'country_id');
    }

}

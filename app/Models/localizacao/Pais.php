<?php

namespace App\Models\localizacao;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table 		= 'pais';
	protected $primaryKey 	= 'id';
	
	public $timestamps = false;
	
	protected $filtable = [
		
	];
	
	protected $hidden = [
		'sortname', 'phonecode'
	];

	public function estados(){
		return $this->hasMany(Estado::class, 'country_id', 'id');	
	}


}

<?php

namespace Digitalmiig\Usuariomiig;

use Illuminate\Database\Eloquent\Model;

class Representante extends Model
{
    
    protected $table = 'representantes';
	public $timestamps = false;


    public function colegios(){

    return $this->hasMany('App\Colegio');
    }
}
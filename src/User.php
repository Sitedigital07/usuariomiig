<?php

namespace Digitalmiig\Usuariomiig;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    public $timestamps = true;

    public function colegios(){

    return $this->hasMany('App\Colegio');
    }


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    
    public function direccion()
    {
        //relacionar con la tabla direccions
        return $this->hasOne('App\Direccion','usuario_id','id');
    }
}

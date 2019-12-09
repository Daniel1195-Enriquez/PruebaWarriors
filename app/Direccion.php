<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    public function user(){
        return $this->belongsTo('App\User','usuario_id');
    }
}

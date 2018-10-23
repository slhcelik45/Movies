<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turler extends Model
{
    protected $table='turler';
    protected $guarded=[];

    public function Filmler(){
        return $this->hasMany('App\Filmeler','turId');
    }
}

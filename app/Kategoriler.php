<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategoriler extends Model
{
    protected $table='kategoriler';
    protected $guarded=[];

    public function Filmler(){
        return $this->hasMany('App\Filmler','kategoriId');
    }
}

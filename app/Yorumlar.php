<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yorumlar extends Model
{
    protected $table='yorumlar';
    protected $guarded=[];

    public function Uyeler(){
        return $this->belongsTo('App\User','uyeId');
    }
    public function Filmler(){
        return $this->belongsTo('App\Filmler','filmId');
    }
}

<?php

namespace App;

use CyrildeWit\EloquentViewable\Viewable;
use Illuminate\Database\Eloquent\Model;

class Filmler extends Model
{
    use Viewable;
    protected $table='filmler';
    protected $guarded=[];

    public function Kategori(){
        return $this->belongsTo('App\Kategoriler','kategoriId');
    }
    public function Tur(){
        return $this->belongsTo('App\Turler','turId');
    }
}

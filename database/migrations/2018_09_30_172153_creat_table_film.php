<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatTableFilm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filmler', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kategoriId');
            $table->integer('turId');
            $table->integer('cesitId');
            $table->string('adi');
            $table->string('afis');
            $table->text('aciklama');
            $table->integer('yil');
            $table->integer('slaydir');
            $table->integer('idmPuan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filmler');
    }
}

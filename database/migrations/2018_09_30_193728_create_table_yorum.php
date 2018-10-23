<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableYorum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yorumlar', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uyeId');
            $table->integer('filmId');
            $table->text('aciklama');
            $table->integer('puan');
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
        Schema::dropIfExists('yorumlar');
    }
}

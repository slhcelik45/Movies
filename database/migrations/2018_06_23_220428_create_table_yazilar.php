<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableYazilar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yazilar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('baslik');
            $table->text('icerik');
            $table->integer('kategoriId');
            $table->integer('userId');
            $table->string('resim');
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
        Schema::dropIfExists('yazilar');
    }
}

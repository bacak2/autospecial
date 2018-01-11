<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBazaDostepnoscisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baza_dostepnoscis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('komisja');
            $table->string('model')->nullable();
            $table->string('rok_modelowy')->nullable();
            $table->string('kolor')->nullable();
            $table->string('tapicerka')->nullable();
            $table->string('opcje')->nullable();
            $table->string('opcje_importerskie')->nullable();
            $table->string('cena_dla_klienta')->nullable();
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
        Schema::dropIfExists('baza_dostepnoscis');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBazaOpcjiWyposazeniasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baza_opcji_wyposazenias', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('model_code3');
            $table->string('opcja_wyposazenia_code');
            $table->string('opcja_wyposazenia_decoded');
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
        Schema::dropIfExists('baza_opcji_wyposazenias');
    }
}

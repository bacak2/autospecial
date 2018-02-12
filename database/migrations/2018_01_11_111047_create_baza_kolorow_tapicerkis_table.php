<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBazaKolorowTapicerkisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baza_kolorow_tapicerkis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kolor_tapicerki_code');
            $table->string('kolor_tapicerki_decoded')->nullable();
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
        Schema::dropIfExists('baza_kolorow_tapicerkis');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBazaDostepnychModelisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baza_dostepnych_modelis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('komisja')->nullable();
            $table->string('model')->nullable();
            $table->string('rok_modelowy')->nullable();
            $table->string('kolor')->nullable();
            $table->string('tapicerka')->nullable();
            $table->string('opcje')->nullable();
            $table->string('opcje_importerskie')->nullable();
            $table->float('cena_dla_klienta', 20, 2)->nullable();
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
        Schema::dropIfExists('baza_dostepnych_modelis');
    }
}

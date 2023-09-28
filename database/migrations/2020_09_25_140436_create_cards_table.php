<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('hipercard');
            $table->boolean('american');
            $table->boolean('aura');
            $table->boolean('hiper');
            $table->boolean('visa');
            $table->boolean('diners');
            $table->boolean('elo');
            $table->boolean('master');
            $table->boolean('boleto');
            $table->boolean('itau');
            $table->boolean('caixa');
            $table->boolean('bradesco');
            $table->boolean('brasil');
            $table->boolean('santander');
            $table->boolean('nubank');
            $table->boolean('inter');
            $table->boolean('next');
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

        Schema::table('cards', function (Blueprint $table) {
            $table->dropIfExists('cards');
        });
    }
}

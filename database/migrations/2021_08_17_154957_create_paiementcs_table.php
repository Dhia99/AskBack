<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaiementcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paiementcs', function (Blueprint $table) {
            $table->id();
            $table->integer('reste');
            $table->integer('paye');
            $table->string('client');
            $table->string('reffact');
            $table->date('date_reglement');
            $table->date('date_echenace');
            $table->timestamps();
            $table->unsignedBigInteger('id_facture') ;
            $table->foreign('id_facture')->references('id')->on('factures');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paiementcs');
    }
}

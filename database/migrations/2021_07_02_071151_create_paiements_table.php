<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaiementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            $table->integer('reste');
            $table->integer('paye');
            $table->string('fournisseur');
            $table->string('reffact');
            $table->date('date_reglement');
            $table->date('date_echenace');
            $table->timestamps();
            $table->unsignedBigInteger('id_facture') ;
            $table->foreign('id_facture')->references('id')->on('facturefs');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paiements');
    }
}

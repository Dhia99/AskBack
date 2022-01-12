<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandeclientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandeclients', function (Blueprint $table) {
            $table->id();
            $table->float('Montant_TTC');
            $table->float('Montant_TVA');
            $table->float('Total_HT');
            $table->unsignedBigInteger('id_client') ; 
            $table->foreign('id_client')->references('id')->on('clients');
            $table->enum('Etat',['Confirmée','Non Confirmée'])->default('Non Confirmée');
            $table->string('Ref_Facture');
            $table->timestamps();
            $table->date('date_echeance');
            $table->string('Nom_client');
            $table->string('note');
            $table->float('Timbre_fiscale');
            $table->date('date_creation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commandeclients');
    }
}

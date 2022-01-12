<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devis', function (Blueprint $table) {
            $table->id();
            $table->float('Montant_TTC');
            $table->float('Montant_TVA');
            $table->float('Total_HT');
            $table->unsignedBigInteger('id_client') ;
            $table->foreign('id_client')->references('id')->on('clients');
            $table->string('Ref_Facture');
            $table->timestamps();
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
        Schema::dropIfExists('devis');
    }
}

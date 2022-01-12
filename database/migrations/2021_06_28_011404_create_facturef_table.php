<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateFacturefTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturefs', function (Blueprint $table) {
            $table->id();
            $table->double('Montant_TTC');
            $table->float('Montant_TVA');
            $table->float('Total_HT');
            $table->unsignedBigInteger('id_fournisseur') ;
            $table->foreign('id_fournisseur')->references('id')->on('fournisseurs');
            $table->enum('Etat',['payé','patiellement payé','non payé'])->default('non payé');
            $table->string('Ref_Facture');
            $table->timestamps();
            $table->date('date_echeance');           // $table->integer('quantite_entre');
            $table->string('Nom_fournisseur');
            $table->string('note');
            $table->float('Timbre_fiscale');
            // $table->string('Libelle');
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
        Schema::dropIfExists('facturef');
    }
}

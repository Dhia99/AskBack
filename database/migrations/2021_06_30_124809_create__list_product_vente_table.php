<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListProductVenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_productventes', function (Blueprint $table) {
            $table->id();
            $table->integer('quantite');
            $table->string('id_product');
            $table->string('Libelle');
            $table->integer('id_facture');
/*
            $table->unsignedBigInteger('facture_id') ;
            $table->foreign('facture_id')->references('id')->on('factures'); */
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
        Schema::dropIfExists('list_productventes');
    }
}

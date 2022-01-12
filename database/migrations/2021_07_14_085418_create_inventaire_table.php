<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventaireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventaire', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_product') ;
            $table->foreign('id_product')->references('id')->on('products');
            $table->string('Libelle');
            $table->timestamps();
            $table->string('note');
            $table->date('date_creation');
            $table->integer('Enstock')->default(0);
            $table->integer('quantite')->default(0);
            $table->double('valeuru')->default(0);
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventaire');
    }
}

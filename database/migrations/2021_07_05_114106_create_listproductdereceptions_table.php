<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListproductdereceptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listproductdereceptions', function (Blueprint $table) {
            $table->id();
            $table->integer('quantite');
            $table->string('id_product');
            $table->string('Libelle');
            $table->integer('id_facture');
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
        Schema::dropIfExists('listproductdereceptions');
    }
}

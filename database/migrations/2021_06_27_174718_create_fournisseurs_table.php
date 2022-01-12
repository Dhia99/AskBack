<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFournisseursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fournisseurs', function (Blueprint $table) {
            $table->id();
            $table->string('NOM');
            $table->enum('CIVILITE', ['M','Mme'])->default('M');
            $table->string('RAISONSOCIALE');
            $table->string('EMAIL');
            $table->string('ADRESSE');
            $table->string('NTELEPHONE');
            $table->string('IDENTIFIANT');
            $table->string('MATFISCALE');
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
        Schema::dropIfExists('fournisseurs');
    }
}

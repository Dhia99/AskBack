<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateDepensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depenses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_fournisseur') ;
            $table->foreign('id_fournisseur')->references('id')->on('fournisseurs');
            $table->enum('type', ['Chèque','Traite'])->default('Chèque');
            $table->string('fournisseur');
            $table->double('montant');
            $table->string('categorie');
            $table->date('datereg');
            $table->string('note');
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
        Schema::dropIfExists('depenses');
    }
}

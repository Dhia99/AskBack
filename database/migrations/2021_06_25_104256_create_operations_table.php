<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations',function (Blueprint $table) {
            $table->id();
            $table->enum('mode', ['Chèque','Espèces'])->default('Chèque');
            $table->enum('typep', ['Débit','Crédit'])->default('Débit');
            $table->string('categorie');
            $table->double('montant');
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
        Schema::dropIfExists('operations');
    }
}

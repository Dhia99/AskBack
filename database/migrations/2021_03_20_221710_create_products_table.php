<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category');
            $table->string('marque');
            $table->enum('type', ['materiel','service'])->default('materiel');
            $table->enum('typep', ['HT','TTC'])->default('HT');
            $table->enum('typetaxe', ['0','fodec'])->default('0');
            $table->integer('pricev');
            $table->integer('priceht');
            $table->integer('pricettc');
            $table->double('refconst')->default(0);
            $table->double('refint');
            $table->enum('TVA',[0,7,13,19])->default(0);
            $table->integer('Enstock')->default(0);
            $table->string('desc')->default(null);
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
        Schema::dropIfExists('products');
    }
}

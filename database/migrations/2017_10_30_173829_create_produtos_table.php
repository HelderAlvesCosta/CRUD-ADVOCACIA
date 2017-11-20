<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       //  Schema::create('locations', function (Blueprint $table) {
         Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
  /*
            $table->Integer('country_id')->unsigned();
            $table->foreign('country_id')
                                  ->references('id')
                                  ->on('countries')
                                  ->onDelete('cascade');
           */
            $table->String('name',50);
            $table->Integer('number');
            $table->Boolean('active');
            $table->String('image',200);
            $table->enum('category',['eletronicos','moveis','limpeza','banho']);
            $table->Text('description');
            $table->Text('helder10');
            
            $table->timestamps();
        });    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('produtos');
    }
}

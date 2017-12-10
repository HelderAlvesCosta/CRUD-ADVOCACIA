<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEscritoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('escritorios', function (Blueprint $table) {
          
            $table->increments('id');
            $table->string('nome',50);
            $table->string('endereco',100);
            $table->string('bairro',40);
            $table->string('cidade',40);
            $table->string('uf',2);
            $table->string('cep',10);

            $table->string('telefone',15);
            $table->string('email',100);
          
            
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
         Schema::dropIfExists('escritorios');
    }
}

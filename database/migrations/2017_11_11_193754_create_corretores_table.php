<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorretoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('corretores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',50);
            $table->string('rg',13);
            $table->string('cpf',11);
            $table->string('endereco',100);
            $table->string('bairro',40);
            $table->string('cidade',40);
            $table->string('uf',2);
            $table->string('cep',8);

            $table->string('telefone',15);
            $table->string('email',100);
          
            $table->decimal('comissao', 8, 2);
            
            $table->string('banco',15);
            $table->string('agencia',5);
            $table->string('conta',7);
            $table->string('tipo',1);
            
          
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
         Schema::dropIfExists('corretores');
    }
}
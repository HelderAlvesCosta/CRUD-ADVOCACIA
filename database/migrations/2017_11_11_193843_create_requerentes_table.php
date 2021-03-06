<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequerentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requerentes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',50);
            $table->string('sexo',10);
            $table->string('nacionalidade',20);
            $table->string('estado_civil',10);
            $table->string('profissao',40);

            $table->string('rg',13);
            $table->string('cpf',14);
            $table->string('endereco',100);
            $table->string('bairro',40);
            $table->string('cidade',40);
            $table->string('uf',2);
            $table->string('cep',10);


            $table->string('telefone',15);
            $table->string('email',100);
            
            $table->string('banco',15);
            $table->string('agencia',7);
            $table->string('conta',14);
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
         Schema::dropIfExists('requerentes');
    }
}

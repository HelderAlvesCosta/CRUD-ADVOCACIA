<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvogadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('advogados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',50);
            $table->string('oab',20);
            $table->string('uf',2);
            $table->string('telefone',15);
            $table->text('email',100);
            
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
         Schema::dropIfExists('advogados');
    }
}

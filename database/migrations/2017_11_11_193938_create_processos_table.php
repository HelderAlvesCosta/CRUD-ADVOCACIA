<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcessosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero',20);
            
            $table->integer('cod_requerente');
            $table->integer('cod_advogado');            
            $table->string('comarca',20);
            $table->string('vara',20);
            $table->string('camara',20);            
            
            $table->dateTime('data_acid');
            $table->string('local_acid',20);
            $table->string('tipo_veiculo_acid',20);
            $table->string('modelo_acid',20);
            $table->string('numero_boletim_acid',20);
            $table->string('dp_acid',20);
           
            $table->string('lesao_hosp',20);
            $table->dateTime('data_hosp');
            $table->string('local_hosp',20);
            $table->string('sala_hosp',20);
        
            $table->dateTime('data_aud',20);
            $table->string('local_aud',20);
            $table->string('sala_aud',20);
            $table->float('valor_condenação_aud',8,2);
          
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
        Schema::dropIfExists('processos');
    }
}

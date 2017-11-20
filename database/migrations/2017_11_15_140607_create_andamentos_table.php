<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAndamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('andamentos', function (Blueprint $table) {
            $table->integer('processo_id')->unsigned();
            $table->foreign('processo_id')
                                ->references('id')
                                ->on('processos')
                                ->onDelete('cascade');
            $table->date('data');
            $table->primary(array('processo_id', 'data'));
            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')
                                ->references('id')
                                ->on('status')
                                ->onDelete('cascade');
            
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
        Schema::dropIfExists('andamentos');
    }
}

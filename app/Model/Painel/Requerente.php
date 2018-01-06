<?php

namespace App\Model\Painel;

use Illuminate\Database\Eloquent\Model;

class Requerente extends Model
{
     protected $fillable =[
                  'nome','sexo','nacionalidade','estado_civil','profissao',
                  'rg','cpf','endereco','bairro','cep',
                  'telefone','email','banco','agencia','conta','tipo'
      
    ];
}

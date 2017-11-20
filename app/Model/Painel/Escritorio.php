<?php

namespace App\Model\Painel;

use Illuminate\Database\Eloquent\Model;

class Escritorio extends Model
{
     protected $fillable =[
                  'nome','endereco','bairro','cidade','uf',
                  'cep','telefone','email'
        
         ];
}

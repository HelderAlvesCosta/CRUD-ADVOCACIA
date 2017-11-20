<?php

namespace App\Model\Painel;

use Illuminate\Database\Eloquent\Model;

class Corretore extends Model
{
     protected $fillable =[
                  'nome','rg','cpf','endereco','bairro','cidade','uf','cep',
                  'telefone','email','comissao','banco','agencia','conta','tipo'
    ];
}

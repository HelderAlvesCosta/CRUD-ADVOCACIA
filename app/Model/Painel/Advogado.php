<?php

namespace App\Model\Painel;

use Illuminate\Database\Eloquent\Model;

class Advogado extends Model
{
     protected $fillable =[
                  'nome','oab','uf','telefone','email'
    ];
}

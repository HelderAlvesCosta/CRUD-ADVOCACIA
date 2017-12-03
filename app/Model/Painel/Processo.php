<?php

namespace App\Model\Painel;

use Illuminate\Database\Eloquent\Model;

class Processo extends Model
{
     protected $fillable =[
                     'numero','cod_requerente','cod_advogado','comarca','vara',
                     'camara','data_acid','hora_acid','local_acid','tipo_veiculo_acid',
                     'modelo_acid','numero_boletim_acid','dp_acid','lesao_hosp',
                     'data_hosp','hora_hosp','local_hosp','sala_hosp','data_aud',
                     'hora_aud','local_aud','sala_aud','valor_condenação_aud'
        
    ];
}

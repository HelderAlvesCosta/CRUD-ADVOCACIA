<?php

namespace App\Model\Painel;

use Illuminate\Database\Eloquent\Model;

class Andamento extends Model
{
    protected $fillable =[
                  'processo_id','data','status_id'
    ];
    
    public function processo(){
        return $this->belongsTo(Processo::class); 
    }  
 
    public function statu(){
        return $this->belongsTo(Statu::class); 
    }  

    
}

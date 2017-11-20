<?php

namespace App\Model\Painel;

use Illuminate\Database\Eloquent\Model;
// use App\Models\Produtos

class Produto extends Model
{
    protected $fillable =[
                  'name','number','active','category','description'
    ];
    // protected $guarded =['admin'];
  
}
/*
class Country extends Model
{
  public function location(){
      
      return $this->hasOne(Location::class);
 
      }
  
}*/
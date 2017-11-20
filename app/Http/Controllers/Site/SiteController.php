<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function __construct(){
        
       // $this->middleware('auth');
    /*  $this->middleware('auth')
              ->only([
                  'contato',
                  'categoria']);
   */
    /*$this->middleware('auth')
              ->exception([
                  'index',
                  'contato']);
     */
    }

    public function index(){
        // Errado
        //return 'Home Page do Site';
        // Certo
      /*  $teste = 123;
        $teste2 = 321;
        $teste3 = 132;*/
        $title = 'Titulo teste';
        $xss = '<script>alert("Ataque xss");</script>';
        $var1 = '123';        
       // return view('teste',['teste' => $teste, 'teste2' => $teste2,'teste3' => $teste3]);
      //  return view('site.home.index',compact('teste','teste2','teste3'));
       return view('site.home.index',compact('title','var1'));


    }
    
     public function contato(){
        
        return view('site.contato.index');
    }
    
    public function categoria($id){
        
        return "Categoria: {$id}";
    }

     public function categoriaOp($id = 1){
        
        return "Categoria2: {$id}";
    }
        }

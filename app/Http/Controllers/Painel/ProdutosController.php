<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Painel\Produto;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;
use App\Http\Requests\Painel\ProductFormRequest;
//use App\Models\Fornecedor;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    private $product;
    private $totalPag = 11;
    
    public function __construct(Produto $product){
        
        $this->product = $product;
    }


   // public function index(Produto $product)
    public function onetoone(){
        
        $country = Country::find(1);
        
        $location = $country->location;
        echo "<hr>Latitude:{location->latitude}<br>";
        echo "<hr>Longitude:{location->longitude}<br>";

        class country extends Model
        public function location(){
           return this->hasOne(Location::class); 
        }
        
    }

     public function onetooneInverse(){
        
        $latitude = 123;
        $longitude = 321;
        $location = Location::where('latitude',$latitude)
                               ->where('longitude',$longitude)
                               ->get()
                               ->first();
        echo $location->id;
        
        $country = $location->country ;
        
        echo $country->name;
      
        class location extends Model
        public function country(){
           return this->belongsTo(Country::class); 
        }
        
    }

    public function onetooneInsert(){
        
        $dataForm = [
             'name'      => 'Alemanha',
             'latitude'  => 123,
             'longitude' => 321,
             'name' => 'Alemanha',
        ]
                
       // $country = Country::create($dataForm);
       $country = Country::where('name','frança')->get()->first();
        
       // $dataForm['country_id'] = $country_id;
       // $location = Location::create($dataform); OU
       // $location = new Location;
       // $location->latitude = $dataForm['latitude'];
       // $location->longitude = $dataForm['longitude'];
       // $location->country_id = $country->id;
       // $saveLocation = $location_>save;         OU
         $location = $country->location()->create($dataForm);
         var_dump($location);

    }

    
    public function index(){
        $title = 'Listagem dos Produtos';
     //   $products = $this->product->all();    
        $products = $this->product->paginate($this->totalPag);    

        return view('painel.produtos.index',compact('products','title'));
       // Return 'Listagem dos produtos';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title ='Cadadastrar novo produto';
        $categorys =['letronicos','moveis','limpeza','banho'];
                
        return view('painel.produtos.create-edit',compact('title','categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  //  public function store(Request $request)
    public function store(ProductFormRequest $request)
 
    {
        //$request->all();
        //dd($request->only(['name','number']));
        //dd($request->except(['name','number']));
        //  dd($request->input('name'));
       // Pega todos os dados do formulário
        $dataForm = $request->all();
     
      //  $dataForm['active'] = ($dataForm['active'] == null) ? 0 : 1;
        $dataForm['active'] = ( ! isset( $dataForm['active'])) ? 0 : 1;
        
       // Validar os dados
       //  $this->validate($request,$this->product->rules);   
        
     /*   $validate = validator($dataForm,$this->product->rules,$messages);
        if ($validate->fails()){
               return redirect()
                     ->route('produtos.create')
                     ->withErrors($validate)
                     ->withInput();                    
       
          }*/
                
       //  $dataForm = $request->except('_token');
        $insert = $this->product->create($dataForm);
        if ( $insert )
            return redirect()->route('produtos.index');
        else
           //- return redirect()->back(); 
            return redirect()->route('produtos.create');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // $product = $this->product->where('id',$id)->get;
    $product = $this->product->find($id);
    $title = "Produto: {$product->name}";
    
    return view('painel.produtos.show',compact('product','title'));
 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->product->find($id);
        
        $title ='Editar produto: {$product->name}';
        $categorys =['letronicos','moveis','limpeza','banho'];
        return view('painel.produtos.create-edit',compact('title','categorys','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  //  public function update(Request $request, $id)
    public function update(ProductFormRequest $request, $id)

    {
       $dataForm = $request->all();
       $product = $this->product->find($id);
       $dataForm['active'] = ( ! isset( $dataForm['active'])) ? 0 : 1;
       $update = $product->update($dataForm);
        if ( $update )
            return redirect()->route('produtos.index');
        else
           //- return redirect()->back(); 
            return redirect()->route('produtos.edit',$id)->with(['errors' => 'Falha ao editar']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->product->find($id);
        $delete = $product->delete();
        if ( $delete )
            return redirect()->route('produtos.index');
        else
           //- return redirect()->back(); 
            return redirect()->route('produtos.show',$id)->with(['errors' => 'Falha ao deletar']);

    }

    public function tests()
    {
      /*  $prod = $this->product;
        $prod->name ='Nome do produto';
        $prod->number =12345;
        $prod->active =1;
        $prod->category = 'eletronicos';
        $prod->description ='description';
        $prod->image ='imagem';
        $insert = $prod->save();

        if ( $insert )
            return 'Inserido com sucesso !!!';
        else
            return 'Falha ao inserir';*/
       /* $insert = $this->product->create([
                       'name'        => 'Nome do produto 6',
                       'number'      => 12345,
                       'active'      => 1,
                       'category'    => 'eletronicos',
                       'description' => 'description',
                       'image'       => 'imagem'
                               ]);
        if ( $insert )
            return "Inserido com sucesso ID: {$insert->id}";
        else
            return 'Falha ao inserir';*/
                    
      /*  $prod = $this->product->find(5); 
        $prod->name ='Update';
        $prod->number =12345;
        $prod->active =1;
        $prod->category = 'eletronicos';
        $prod->description ='description';
        $prod->image ='imagem';
        $update = $prod->save();*/
        
       //$prod = $this->product->where('number','=',1235); também funciona
       /* $prod = $this->product->find(5); 
        $update = $prod->update([
                       'name'        => 'Update 2',
                       'number'      => 12345,
                       'active'      => 1,
                       'category'    => 'eletronicos',
                       'description' => 'description',
                       'image'       => 'imagem'
                      
        ]);     
         if ( $update )
            return "Updated com sucesso!!!";
        else
            return 'Falha no update';*/
        $prod = $this->product->find(3); 
        $delete = $prod->delete();     
         if ( $delete )
            return "Deletedcom sucesso!!!";
        else
            return 'Falha no delete';

    }
    
}

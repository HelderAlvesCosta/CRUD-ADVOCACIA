<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Painel\User;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;
use App\Http\Requests\Painel\UserFormRequest;
use Illuminate\Contracts\Encryption\Encrypter as EncrypterContract;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    private $user;
    private $totalPag = 10;
    
    public function __construct(User $user){
        
        $this->user = $user;
    }
    
    public function index()
    {
        
        $title = 'Listagem dos Usuarios';
        $users = $this->user->paginate($this->totalPag);
     
        return view('painel.users.index',compact('users','title'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title ='Cadastrar novo usuário';
        return view('painel.users.create-edit',compact('title'));
  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        $dataForm = $request->all();
    //    $value = encrypt($dataForm['password']);
    //    $decrypted = Crypt::decrypt($value);
    //    return $decrypted;
        
        $dataForm['password'] =  bcrypt($dataForm['password']);
     
        $insert = $this->user->create($dataForm);
        if ( $insert )
            return redirect()->route('users.index');
        else
            return redirect()->route('users.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->user->find($id);
        $title = "Usuário: {$user->name}";
    
        return view('painel.users.show',compact('user','title'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $user = $this->user->find($id);
         $title = "Editar usuário: {$user->name}";
        return view('painel.users.create-edit',compact('title','user'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserFormRequest $request, $id)
    {
    // return 'oiiiiiiiiiiiiii';
        $dataForm = $request->all();
    //   $dataForm['password'] =  bcrypt($dataForm['password']);
     
       $user = $this->user->find($id);
       $update = $user->update($dataForm);
        if ( $update )
            return redirect()->route('users.index');
        else
           //- return redirect()->back(); 
            return redirect()->route('users.edit',$id)->with(['errors' => 'Falha ao editar']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->user->find($id);
        $delete = $user->delete();
        if ( $delete )
            return redirect()->route('users.index');
        else
           //- return redirect()->back(); 
            return redirect()->route('users.show',$id)->with(['errors' => 'Falha ao deletar']);

    }
}

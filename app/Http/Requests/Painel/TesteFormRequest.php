<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class TesteFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         return [
           'nome'        => 'required|min:3|max:100',
           'email'        => 'required|min:3|max:100',
             
        ];
  
    }
    
    public function messages(){
        return[
            'nome.required'      => 'O campo Nome é de preenchimento obrigatório',
            'email.required'      => 'O campo E-mail é de preenchimento obrigatório',
            
            ];
    }
}

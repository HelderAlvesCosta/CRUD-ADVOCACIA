<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class StatuFormRequest extends FormRequest
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
           'descricao'        => 'required|min:3|max:100'
        ];
  
    }
 
    public function messages(){
        return[
            'descricao.required'      => 'O campo é de preenchimento obrigatório'
            ];
    }
}

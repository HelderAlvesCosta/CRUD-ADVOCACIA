<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class AdvogadoFormRequest extends FormRequest
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
           'nome'        => 'required|min:15|max:50',
           'oab'         => 'required',
           'uf'          => 'required',
           'cidade'      => 'required'
        ];
    }
    
    public function messages(){
        return[
            'nome.required'      => 'O campo Nome é de preenchimento obrigatório',
            'nome.min'           => 'O campo Nome deve ter no mínimo 15 caracteres',
            'oab.required'       => 'O campo OAB é de preenchimento obrigatório',
            'uf.required'        => 'O campo UF é de preenchimento obrigatório',
            'cidade.required'    => 'O campo Cidade é de preenchimento obrigatório'
           
            ];
    }
}

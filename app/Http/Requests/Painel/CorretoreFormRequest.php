<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class CorretoreFormRequest extends FormRequest
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
           'nome'        => 'required|min:3|max:50',
           'rg'          => 'required|min:3|max:13',
           'cpf'         => 'required',
           'endereco'    => 'required|min:3|max:100',
           'bairro'      => 'required|min:3|max:40',
           'email'       => 'max:100',
           'banco'       => 'min:3|max:15',
           'conta'       => 'min:3|max:7',
           'agencia'     => 'min:3|max:5',
           'tipo'        => 'min:1|max:1'
        ];   
    }
    
     public function messages(){
        return[
            'nome.required'      => 'O campo Nome é de preenchimento obrigatório',
            'nome.max'           => 'O campo Nome tem no máximo 50 caracteres',
            'rg.required'        => 'O campo RG é de preenchimento obrigatório',
            'rg.max'             => 'O campo RG tem no máximp 13 caracteres',

            'cpf.required'       => 'O campo CPF é de preenchimento obrigatório',
            'endereco.required'  => 'O campo Endereço é de preenchimento obrigatório',
            'endereco.max'       => 'O campo Endereço tem no máximo 100 caracteres',
            
            'bairro.required'    => 'O campo Bairro é de preenchimento obrigatório',
            'bairro.max'         => 'O campo Bairro tem no máximo 40 caracteres',
          
            'uf.required'        => 'O campo UF é de preenchimento obrigatório',
            'cidade.required'    => 'O campo Cidade é de preenchimento obrigatório',
            'cep.required'       => 'O campo Cep é de preenchimento obrigatório',
            
            'email.max'          => 'O campo E-mail tem no máximo 100 caracteres',
            'banco.max'          => 'O campo Banco tem no máximo 15 caracteres',
            'conta.max'          => 'O campo Conta tem no máximo 7 caracteres',
            'agencia.max'        => 'O campo Agencia tem no máximo 5 caracteres',
            'tipo.max'           => 'O campo Tipo tem no máximo 1 caracter'

            ];
    }
}

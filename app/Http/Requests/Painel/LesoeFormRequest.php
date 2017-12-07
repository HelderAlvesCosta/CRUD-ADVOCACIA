<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class LesoeFormRequest extends FormRequest
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
           'descricao'       => 'required|min:40|max:400',
           'grupo_id'        => 'required'
        ];
    }
    
     public function messages(){

         return[
            'descricao.required'      => 'O campo Descrição é de preenchimento obrigatório',
            'gupo_id.required.max'    => 'O campo Grupo é de preenchimento obrigatório',
            'descricao.min'           => 'O campo Descrição tem no mínimo 40 caracteres',
            'descricao.max'           => 'O campo Descrição tem no máximp 400 caracteres'
        ];
    }
}

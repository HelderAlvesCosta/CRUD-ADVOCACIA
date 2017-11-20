<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class AndamentoFormRequest extends FormRequest
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
           'id_processo'   => 'required',
           'data'          => 'required',
           'id_status'     => 'required'
       ];

    }
    
    public function messages(){
        return[
               'id_processo'   => 'O campo é de preenchimento obrigatório',
               'data'          => 'O campo é de preenchimento obrigatório',
               'id_status'     => 'O campo é de preenchimento obrigatório'
            ];
    }
}

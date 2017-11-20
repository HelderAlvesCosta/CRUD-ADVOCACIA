<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class ProcessoFormRequest extends FormRequest
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
           'numero'        => 'required|min:3|max:20'
        ];

    }
    
    public function messages(){
        return[
            'numero.required'      => 'O campo é de preenchimento obrigatório'
            ];
    }
}

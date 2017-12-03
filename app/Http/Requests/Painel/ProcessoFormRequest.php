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
           'numero'               => 'required|min:3|max:20',
           'comarca'              => 'required|min:3|max:20',
           'vara'                 => 'required|min:3|max:20',
           'camara'               => 'required|min:3|max:20',  
            
           'local_acid'           => 'required|min:3|max:20',  
           'tipo_veiculo_acid'    => 'required|min:3|max:20',  
           'modelo_acid'          => 'required|min:3|max:20',  
           'numero_boletim_acid'  => 'required|min:3|max:20',  
 
           'local_hosp'           => 'required|min:3|max:20',  
           'sala_hosp'            => 'required|min:3|max:20',  
            
           'local_aud'            => 'required|min:3|max:20',  
           'sala_aud'             => 'required|min:3|max:20',  
            
             
            ];

    }
    
    public function messages(){
        return[
            'numero.required'      => 'O campo Número  é de preenchimento obrigatório',
            'numero.max'           => 'O campo Número tem no máximo 20 caracteres',
        
            'comarca.required'     => 'O campo Comarca é de preenchimento obrigatório',
            'comarca.max'          => 'O campo Comarca tem no máximo 20 caracteres',
        
            'vara.required'        => 'O campo Vara é de preenchimento obrigatório',
            'vara.max'             => 'O campo Vara tem no máximo 20 caracteres',
                   
            'camara.required'      => 'O campo Câmara é de preenchimento obrigatório',
            'camara.max'           => 'O campo Câmara tem no máximo 20 caracteres',
            
            'local_acid.max'           => 'O campo Local do acidente tem no máximo 20 caracteres',  
            'tipo_veiculo_acid.max'    => 'O campo Tipo de veículo tem no máximo 20 caracteres',  
            'modelo_acid.max'          => 'O campo Modelo do veículo tem no máximo 20 caracteres',  
            'numero_boletim_acid.max'  => 'O campo Número do boletim tem no máximo 20 caracteres',  
 
            'local_hosp.max'           => 'O campo Local hospitalar tem no máximo 20 caracteres',  
            'sala_hosp.max'            => 'O campo Sala hospitalar tem no máximo 20 caracteres',  
            
            'local_aud.max'            => 'O campo Local de audiência tem no máximo 20 caracteres',  
            'sala_aud.max'             => 'O campo Sala de audiência tem no máximo 20 caracteres',  

        
            ];
    }
}

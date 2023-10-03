<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AgendaFormRequestUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'cliente_id'=>'required',
            'profissional_id'=>'required',
             'data_hora'=>'required|date',
              'valor'=>'required|decimal:2',
               'servico_id'=>'required|min:2', 
               'tipo_pagamento'=>'required|min:3|max:20'
        ];

    }


        public function failedValidation(Validator $validator)
        {
            throw new HttpResponseException(response()->json([
                'success' => false,
                'error' => $validator->errors()
            ]));
        }
    
    
        public function messages()
        {
            return [   
                'cliente_id.required'=>'Esse campo é obrigatorio',
                ' profissional_id.required'=>'Esse campo é obrigatorio',
                 'data_hora.required'=>'Esse campo é obrigatorio',
                   'servico_id.required'=>'Esse campo é obrigatorio', 
                   'tipo_pagamento.required'=>'Esse campo é obrigatorio',


                
                      'cliente_id.min'=>'Esse campo é obrigatorio',
                      ' profissional_id..min'=>'Esse campo é obrigatorio',
                       'data_id.min'=>'Esse campo é obrigatorio',
                        'hora_id.min'=>'Esse campo é obrigatorio',
                         'servico_id.min'=>'Esse campo é obrigatorio', 
                         'tipo_pagamento.min'=>'Esse campo é obrigatorio'



             ];
        }









    }


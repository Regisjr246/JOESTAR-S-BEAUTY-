<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AgendaFormRequest extends FormRequest
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
            'cliente'=>'required|max:80|min:2',
            'profissional'=>'required|max:80|min:2',
             'data'=>'required|max:80|min:2',
              'hora'=>'required|max:80|min:2',
               'servico'=>'required|max:80|min:2', 
               'formaDePagamento'=>'required|max:80|min:2'
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
                'cliente.required'=>'Esse campo é obrigatorio',
                ' profissional.required'=>'Esse campo é obrigatorio',
                 'data.required'=>'Esse campo é obrigatorio',
                  'hora.required'=>'Esse campo é obrigatorio',
                   'servico.required'=>'Esse campo é obrigatorio', 
                   'formaDePagamento.required'=>'Esse campo é obrigatorio',


                   'cliente.max'=>'Esse campo é obrigatorio',
                   ' profissional.max'=>'Esse campo é obrigatorio',
                    'data.maxd'=>'Esse campo é obrigatorio',
                     'hora.max'=>'Esse campo é obrigatorio',
                      'servico.max'=>'Esse campo é obrigatorio', 
                      'formaDePagamento.max'=>'Esse campo é obrigatorio',


                      'cliente.min'=>'Esse campo é obrigatorio',
                      ' profissional.min'=>'Esse campo é obrigatorio',
                       'data.min'=>'Esse campo é obrigatorio',
                        'hora.min'=>'Esse campo é obrigatorio',
                         'servico.min'=>'Esse campo é obrigatorio', 
                         'formaDePagamento.min'=>'Esse campo é obrigatorio'



             ];
        }









    }


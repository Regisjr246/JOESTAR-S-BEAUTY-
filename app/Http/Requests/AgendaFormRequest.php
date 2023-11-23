<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

        'profissional_id' => 'required',
        'cliente_id' => 'required',
        'servico_id' => 'required',
        'data_hora' => 'required|date',
        'tipo_pagamento' => 'required|max:20|min:3',
        'valor' => 'required|decimal:2',
        ];
    }
 
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }
    public function messages(){

        return[
            'profissional_id.required' => 'o profissional é obrigatorio',
            'cliente_id.required' => 'o cliente é obrigatorio',
            'servico_id.required' => 'o serviço é obrigatorio',
            'data_hora.required' => 'o campo data/hora é obrigatorio',
            'data_hora.date' => 'O campo data/hora deve ter uma data valivel',
            'tipo_pagamento.required' => 'o tipo de pagamento é obrigatorio',
            'tipo_pagamento.max' => 'o tipo de pagamento deve contar no maximo 10 caracteres',
            'tipo_pagamento.min' => 'o tipo de pagamento deve contar no minimo 3 caracteres',
            'valor.required' => 'o valor é obrigatorio',
            'valor.decimal' => 'O campo valor deve ter apenas numeros'
        ];
    }
    
}
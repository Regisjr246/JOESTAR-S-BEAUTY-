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
          
            'profissional_id'=>'required|unique:Agendas,profissional_id',
             'data_hora'=>'required|date',
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
                'profissional_id.required'=>'Esse campo é obrigatorio',
                 'data_hora.required'=>'Esse campo é obrigatorio',
                 'profissional_id.unique'=>'Esse id já foi cadastrado',
             ];
        }
    }


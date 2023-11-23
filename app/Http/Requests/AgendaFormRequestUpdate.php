<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'profissional_id'=>'required',
             'dataHora'=>'required|date',
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
                'dataHora.required'=>'Esse campo é obrigatorio',
                'dataHora.date' => 'O campo data e hora deve ter apenas numeros',
             ];
        }
}
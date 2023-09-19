<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ClienteFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [

            'nome'=>'required|max:120|min:5',
            'celular'=>'required|unique|max:11|min:10',
            'email'=>'required|unique|max:120',
            'cpf'=>'required|unique|max:11|min:11',
            'dataNascimento'=>'required',
            'cidade'=>'required|max:120',
            'estado'=>'required|max:2|min:2',
            'pais'=>'required|max:80|min:5',
            'rua'=>'required|max:120|min:5',
                'numero'=>'required|max:10|min:1',
                'bairro'=>'required|max:100|',
                'cep'=>'required|max:8|',
                'complemento'=>'required|max:8|min:8',
                'senha'=>'required|'

        ];
    }



public function failedValidation(Validator $validator){

    throw new HttpResponseException
    ( response()->json([
        'success'=> false,
        'error'=>$validator->errors()
    ]));
}


public function messages(){
    return[


        'nome.required.required'=>'O campo nome é obrigatorio',
        'celular.required'=>'O campo celular é obrigatorio',
        'email.required'=>'O email celular é obrigatorio',
        'cpf.required'=>'O campo cpf é obrigatorio',
        'dataNascimento.required'=>'O campo data de nascimento é obrigatorio',
        'cidade.required'=>'O campo cidade é obrigatorio',
        'estado.required'=>'O campo estado é obrigatorio',
        'pais.required'=>'O campo país é obrigatorio',
        'rua.required'=>'O campo rua é obrigatorio',
            'numero.required'=>'O campo numero é obrigatorio',
            'bairro.required'=>'O campo bairro é obrigatorio',
            'cep.required'=>'O CEP celular é obrigatorio',
            'complemento.required'=>'O campo complemento é obrigatorio',
            'senha.required'=>'O campo senha é obrigatorio'





    ];
}








}

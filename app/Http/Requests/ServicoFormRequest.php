<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ServicoFormRequest extends FormRequest
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
            'nome'=>'required|max:80|min:5|unique:servicos,nome',  
            'preco'=>'required|decimal:2',
            'duracao'=>'required|numeric|min:2',  
            'descricao'=>'required|max:200|min:5',
            
        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException( response()->json([
            'success'=> false,
            'error'=>$validator->errors()
        ]));
    }


    public function messages(){
        return[
            'nome.required'=> 'O campo nome é obrigatorio',
    'nome.max'=> 'O campo nome deve conter no maximo 80 caracteres',
    'nome.min'=> 'O campo nome deve conter no manimo 5 caracteres',
    'preco.required'=> 'Preço obrigatorio',
    'preco.decimal'=> 'Preço deve conter só nuemros ex:20.00 ',
    
    'duracao.required'=>'Duracao obrigatorio',
    'duracao.numeric'=>'Duracao é apenas numeros',
    
    'duracao.min'=>'Duracao deve conter no maximo 2 caracteres',
    
    'descricao.required'=>'Descrição obrigatorio',
    'descricao.max'=>'Descricao deve conter no maximo 200 caracteres',
    'descricao.min'=>'Descricao deve conter no manimo 5 caracteres'
    
        ];
    }


}

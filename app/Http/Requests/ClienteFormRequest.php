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

                        'nome' => 'required|max:120|min:5',
                        'celular' => 'required|unique:clientes,celular|max:11|min:10',
                        'email' => 'required|unique:clientes,email|max:120',
                        'cpf' => 'required|unique:clientes,cpf|max:11|min:11',
                        'dataNascimento' => 'required|date',
                        'cidade' => 'required|max:120',
                        'estado' => 'required|max:2|min:2',
                        'pais' => 'required|max:80|min:5',
                        'rua' => 'required|max:120|min:5',
                        'numero' => 'required|max:10',
                        'bairro' => 'required|max:100|',
                        'cep' => 'required|max:8|min:8',
                        'complemento' => 'required|max:150|',
                        'password' => 'required|'

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


                        //NOME
                        'nome.required' => 'O campo nome é obrigatorio',
                        'nome.max' => 'O campo nome deve conter  no maximo 120 caracteres',
                        'nome.min' => 'O campo nome deve conter no minimo 5 caracteres',

                        //CELULAR
                        'celular.required' => 'O campo celular é obrigatorio',
                        'celular.min' => 'O campo celular deve conter no minimo 11caracteres',
                        'celular.max' => 'O campo celular deve conter no maximo 11 caracteres',
                        'celular.unique' => 'Celular já cadastrado, informe outro',

                        //EMAIL
                        'email.required' => 'O email celular é obrigatorio',
                        'email.unique' => 'Email já cadastrado informe outro email',
                        'email.max' => 'O email celular de conter 120 caracteres',
 
                        //CPF
                        'cpf.required' => 'O campo cpf é obrigatorio',
                        'cpf.max' => 'O campo cpf deve ter no maximo 11 caracteres',
                        'cpf.min' => 'O campo cpf deve ter no mainimo 11 caracteres',
                        'cpf.unique' => 'Cpf já cadastrado, informe outro cpf',

                        //DATA DE NASCIMENTO        
                        'dataNascimento.required' => 'O campo data de nascimento é obrigatorio',
                        'dataNascimento.date' => 'O campo data de nascimento de estar no formato de data ex:12/04/2000',

                        //CIDADE        
                        'cidade.required' => 'O campo cidade é obrigatorio',
                        'cidade.max' => 'O campo cidade deve conter no maximo 120 caracteres',


                        //ESTADO
                        'estado.required' => 'O campo estado é obrigatorio',
                        'estado.min' => 'O campo estado deve coonter no minimo 2 caracteres',
                        'estado.max' => 'O campo estado deve conter no maximo 2 caracteres',

                        //PAÍS
                        'pais.required' => 'O campo país é obrigatorio',
                        'pais.required' => 'O campo país deve conter no minímo 80 caracteres',
                        'pais.max' => 'O campo país deve conter no maximo 5 caracteres',

                        //RUA        
                        'rua.required' => 'O campo rua é obrigatorio',
                        'rua.required' => 'O campo rua deve conter no minimo 5 caracteres',
                        'rua.required' => 'O campo rua deve conter no maximo 120 caracteres',

                        //NUMERO
                        'numero.required' => 'O campo numero é obrigatorio',
                        'numero.max' => 'O campo numero deve conter no maximo 10 carcteres',

                        //BAIRRO
                        'bairro.required' => 'O campo bairro é obrigatorio',
                        'bairro.max' => 'O campo bairro deve conter no maximo 100 caracteres',

                        //CEP
                        'cep.required' => 'O CEP  é obrigatorio',
                        'cep.max' => 'O CEP deve conter no maximo 8 caracteres',
                        'cep.min' => 'O CEP deve conter no minimo 8 caracteres',

                        //COMPLEMENTO
                        'complemento.required' => 'O campo complemento é obrigatorio',
                        'complemento.max' => 'O campo complemento deve conter no maximo 150',

                        //SENHA       
                        'password.required' => 'O campo senha é obrigatorio'





                ];
        }
}

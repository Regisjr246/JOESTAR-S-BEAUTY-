<?php

namespace Database\Seeders;

use App\Models\Profissional;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class profissionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 5; $i++){
        Profissional::create([
            'nome' => 'Teste'.$i,
            'celular' => '123456788'.$i,
            'email' => 'teste'.$i.'@gmail.com.br',
            'cpf' => rand(00000000001, 99999999999),
            'dataDeNascimento'=> '1111-12-11',
            'cidade'=> 'cidadeTeste',
            'estado'=> 'sp',
            'pais'=> 'brasil',
            'rua'=> 'teste',
            'numero'=> '122'.$i,
            'bairro'=> 'teste',
            'cep'=> '12345678',
            'complemento'=> 'teste',
            'senha' => Hash::make('123456'),
            'salario' => '12.00'
        ]);
    }
    }
}

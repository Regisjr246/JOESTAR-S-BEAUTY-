<?php

namespace Database\Seeders;

use App\Models\cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class clienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 5; $i++){
        cliente::create([
            'nome' => 'Teste'.$i,
            'email' => 'teste'.$i.'@gmail.com.br',
            'cpf' => rand(00000000001, 99999999999),
            'celular' => '123456789'.$i,
            'dataNascimento'=> '1111-12-11',
            'cidade'=> 'cidadeTeste',
            'estado'=> 'sp',
            'pais'=> 'brasil',
            'rua'=> 'teste',
            'numero'=> '122'.$i,
            'bairro'=> 'teste',
            'cep'=> '19470000',
            'complemento'=> 'teste',
            'senha' => Hash::make('123456'),
        ]);
    }
    }
}

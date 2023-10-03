<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $fillable =[
        'cliente_id',
        'profissional_id',
         'data_hora',
           'servico_id', 
           'tipo_pagamento',
           'valor'
  
    ];
}

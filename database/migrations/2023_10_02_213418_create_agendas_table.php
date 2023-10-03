<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->string('cliente',120)->nullable(false);
             $table->string('profissional',120)->nullable(false);
             $table->string('data',120)->nullable(false);
              $table->string('hora',120)->nullable(false);
               $table->string('servico',120)->nullable(false); 
               $table->string('formaDePagamento',120)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendas');
    }
};

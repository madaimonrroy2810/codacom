<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vendedores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_completo');
            $table->string('ci')->unique();
            $table->string('foto_carnet');
            $table->string('telefono')->unique();
            $table->string('nombre_negocio');
            $table->string('tipo_producto');
            $table->string('foto_frente');
            $table->string('foto_izquierda');
            $table->string('foto_derecha');
            $table->string('codigo_verificacion')->unique();
            $table->string('estado')->default('pendiente');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vendedores');
    }
};
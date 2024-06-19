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
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->text('cliente_nome');
            $table->unsignedBigInteger('plano_saude');
            $table->date('data_contratacao');
            $table->float('valor_venda');
            $table->unsignedBigInteger('tipo_plano');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('plano_saude')->references('id')->on('planos')->onDelete('cascade');
            $table->foreign('tipo_plano')->references('id')->on('tipo_planos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendas');
    }
};

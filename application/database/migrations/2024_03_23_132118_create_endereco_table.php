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
        Schema::create('endereco', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pessoa_id')->nullable()->references('id')->on('pessoa')->onDelete('cascade');
            $table->string('cep',8)->nullable();
            $table->string('endereco', 200)->nullable();
            $table->string('numero',10)->nullable();
            $table->string('complemento', 40)->nullable();
            $table->string('bairro',100)->nullable();
            $table->string('cidade', 100)->nullable();
            $table->string('uf',2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('endereco');
    }
};

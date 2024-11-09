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
        Schema::create('conta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pessoa_id')->references('id')->on('pessoa');
            $table->foreignId('banco_id')->references('id')->on('banco');
            $table->smallInteger('tipo_conta')->default(1);
            $table->string('agencia', 10);
            $table->string('conta', 20);
            $table->string('digito', 2);
            $table->string('titular', 200);
            $table->smallInteger('chave_pix_tipo')->nullable();
            $table->string('chave_pix',200)->nullable();
            $table->boolean('ativo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conta');
    }

};

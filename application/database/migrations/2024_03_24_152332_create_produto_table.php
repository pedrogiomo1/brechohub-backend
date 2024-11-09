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
        Schema::create('produto', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_id')->foreign('tenant_id')->references('id')->on('tenants');
            $table->foreignId('categoria_id')->references('id')->on('categoria')->onDelete('cascade');
            $table->foreignId('fornecedor_id')->references('id')->on('fornecedor')->onDelete('cascade');
            $table->string('codigo',20)->nullable();
            $table->string('descricao',200)->nullable();
            $table->decimal('preco_venda',16,2)->default(0);
            $table->smallInteger('tipo_comissao')->default(1);
            $table->decimal('comissao',16,2)->default(0);
            $table->decimal('valor_fornecedor',16,2)->default(0);
            $table->smallInteger('status')->default(1);
            $table->string('imagem')->nullable();
            $table->text('observ')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produto');
    }
};

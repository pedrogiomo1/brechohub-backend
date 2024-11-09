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
        Schema::create('fornecedor', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_id')->foreign('tenant_id')->references('id')->on('tenants');
            $table->foreignId('pessoa_id')->references('id')->on('pessoa')->onDelete('cascade');
            $table->boolean('ativo')->default(true);
            $table->smallInteger('tipo_comissao')->default(1);
            $table->decimal('comissao',16,2)->default(0);
            $table->text('observ')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fornecedor');
    }
};

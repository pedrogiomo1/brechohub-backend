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
        Schema::create('supplier', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_id')->foreign('tenant_id')->references('id')->on('tenants');
            $table->foreignId('person_id')->references('id')->on('person')->onDelete('cascade');
            $table->boolean('ativo')->default(true);
            $table->smallInteger('commission_type')->default(1);
            $table->decimal('commission',16,2)->default(0);
            $table->text('observ')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplier');
    }
};

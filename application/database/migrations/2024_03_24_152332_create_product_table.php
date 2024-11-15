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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_id')->foreign('tenant_id')->references('id')->on('tenants');
            $table->foreignId('category_id')->references('id')->on('category')->onDelete('cascade');
            $table->foreignId('supplier_id')->references('id')->on('supplier')->onDelete('cascade');
            $table->string('code',20)->nullable();
            $table->string('description',200)->nullable();
            $table->decimal('sale_price',16,2)->default(0);
            $table->smallInteger('commission_type')->default(1);
            $table->decimal('commission',16,2)->default(0);
            $table->decimal('supplier_price',16,2)->default(0);
            $table->smallInteger('status')->default(1);
            $table->string('image')->nullable();
            $table->text('observations')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};

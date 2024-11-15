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
        Schema::create('natural_person', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id')->references('id')->on('person')->onDelete('cascade');
            $table->string('cpf', 11)->nullable();
            $table->date('birthdate')->nullable();
            $table->string('rg',40)->nullable();
            $table->string('rg_issuer',40)->nullable();
            $table->date('rg_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('natural_person');
    }

};

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
        Schema::create('company_person', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id')->references('id')->on('person')->onDelete('cascade');
            $table->string('business_name', 200)->nullable();
            $table->string('cnpj',14)->nullable();
            $table->string('state_registration',40)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_person');
    }
};

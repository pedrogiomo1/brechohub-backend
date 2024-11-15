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
        Schema::create('account_number', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id')->references('id')->on('person');
            $table->foreignId('bank_id')->references('id')->on('bank');
            $table->smallInteger('account_type')->default(1);
            $table->string('agency_number', 10);
            $table->string('account_number', 20);
            $table->string('account_digit', 2);
            $table->string('holder_name', 200);
            $table->smallInteger('pix_type')->nullable();
            $table->string('pix_key',200)->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_number');
    }

};

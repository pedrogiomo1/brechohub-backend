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
        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id')->nullable()->references('id')->on('person')->onDelete('cascade');
            $table->string('postal_code',8)->nullable();
            $table->string('address', 200)->nullable();
            $table->string('number',10)->nullable();
            $table->string('complement', 40)->nullable();
            $table->string('neighborhood',100)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('state',2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('address');
    }
};

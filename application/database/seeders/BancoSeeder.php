<?php

namespace Database\Seeders;

use App\Models\Banco;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BancoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Banco::create(array('id' => '1', 'codigo' => '001', 'nome' => 'Banco do Brasil', 'imagem' => ''));
        Banco::create(array('id' => '2', 'codigo' => '104', 'nome' => 'Caixa Econômica Federal', 'imagem' => ''));
        Banco::create(array('id' => '3', 'codigo' => '237', 'nome' => 'Bradesco', 'imagem' => ''));
        Banco::create(array('id' => '4', 'codigo' => '341', 'nome' => 'Itaú', 'imagem' => ''));
        Banco::create(array('id' => '5', 'codigo' => '033', 'nome' => 'Santander', 'imagem' => ''));
    }

}
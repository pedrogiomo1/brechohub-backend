<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bank::create(array('id' => '1', 'code' => '001', 'name' => 'Banco do Brasil', 'image' => ''));
        Bank::create(array('id' => '2', 'code' => '104', 'name' => 'Caixa Econômica Federal', 'image' => ''));
        Bank::create(array('id' => '3', 'code' => '237', 'name' => 'Bradesco', 'image' => ''));
        Bank::create(array('id' => '4', 'code' => '341', 'name' => 'Itaú', 'image' => ''));
        Bank::create(array('id' => '5', 'code' => '033', 'name' => 'Santander', 'image' => ''));
    }

}
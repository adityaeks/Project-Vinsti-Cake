<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employees')->insert([
            [
                'name' => 'Purnama',
                'alamat' => 'Anaking',
                'email'=> 'purnama.anaking@gmail.com',
                'age' => 20,
                'masukan' => 'ini masukan pertama',
                'position_id' => 1
            ],
            [
                'name' => 'Adzanil',
                'alamat' => 'Rachmadhi',
                'email'=> 'adzanil.rachmadhi@gmail.com',
                'age' => 25,
                'masukan' => 'ini masukan kedua',
                'position_id' => 2
            ],
            [
                'name' => 'Berlian',
                'alamat' => 'Rahmy',
                'email'=> 'berlian.rahmy@gmail.com',
                'age' => 23,
                'masukan' => 'ini masukan ketiga',
                'position_id' => 3
            ],
        ]);
    }
}


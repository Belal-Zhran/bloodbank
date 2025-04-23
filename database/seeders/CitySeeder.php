<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cities')->insert([
            [ 'name' => 'Kaf-Saqr', 'governorate_id'=> 1, 'created_at' => now(), 'updated_at' => now() ],
            [ 'name' => 'Belpees', 'governorate_id'=> 1, 'created_at' => now(), 'updated_at' => now() ],
            [ 'name' => 'El-Mansoura','governorate_id' =>2 , 'created_at' => now(), 'updated_at' => now() ],
            [ 'name' => 'Dekernes','governorate_id' =>2 , 'created_at' => now(), 'updated_at' => now() ],

        ]);
    }
}

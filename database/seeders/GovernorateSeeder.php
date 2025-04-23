<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Governorate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GovernorateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Governorates')->insert([
           [ 'name' => 'El-Sharqia', 'created_at' => now(), 'updated_at' => now() ],
           [ 'name' => 'El-Dakahlia', 'created_at' => now(), 'updated_at' => now() ],

        ]);
        Governorate::factory()
            ->count(5)
            ->has(City::factory()->count(3))
            ->create();
    }
}

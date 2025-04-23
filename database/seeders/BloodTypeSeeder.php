<?php

namespace Database\Seeders;

use App\Models\BloodType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blood_types')->insert([
            ['name' => 'A+','created_at' => now(),'updated_at' => now()],
            ['name' => 'A-','created_at' => now(),'updated_at' => now()],
            ['name' => 'B+','created_at' => now(),'updated_at' => now()],
            ['name' => 'B-','created_at' => now(),'updated_at' => now()],
            ['name' => 'AB+','created_at' => now(),'updated_at' => now()],
            ['name' => 'AB-','created_at' => now(),'updated_at' => now()],
            ['name' => 'O+','created_at' => now(),'updated_at' => now()],
            ['name' => 'O-','created_at' => now(),'updated_at' => now()],
        ]);

    }
}

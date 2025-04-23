<?php

namespace Database\Seeders;

use App\Models\Complaint;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComplaintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Complaints')->insert([
            'title' => 'something wrong',
            'body' => 'something in app went wrong from no where',
            'client_id' => 1,
            'created_at' => now(),
            'updated_at' => now()

        ]);

        Complaint::factory()
            ->count(5)
            ->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Catigory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatigorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Catigory::factory()
            ->count(5)
            ->has(Article::factory()->count(9))
            ->create();
    }
}

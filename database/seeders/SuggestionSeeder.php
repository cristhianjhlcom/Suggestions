<?php

namespace Database\Seeders;

use App\Models\Suggestion;
use Database\Factories\SuggestionFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuggestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Suggestion::factory(50)->create();
    }
}

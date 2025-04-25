<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Suggestion;
use Illuminate\Database\Seeder;

final class SuggestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Suggestion::factory(50)->create();
    }
}

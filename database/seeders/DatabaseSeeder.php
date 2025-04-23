<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

final class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'email' => 'admin@email.com',
            'password' => Hash::make('12345678'),
        ]);

        $this->call([
            UserSeeder::class,
            SuggestionSeeder::class,
            SuggestionVotesSeeder::class,
        ]);
    }
}

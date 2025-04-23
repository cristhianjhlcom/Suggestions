<?php

namespace Database\Seeders;

use App\Models\Suggestion;
use App\Models\User;
use Database\Factories\SuggestionFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuggestionVotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suggestions = Suggestion::all();
        $users = User::where('id', '!=', 1)->get();

        foreach ($suggestions as $suggestion) {
            // Para cada sugerencia, seleccionar un número aleatorio de usuarios que votarán
            $randomUsers = $users->random(rand(0, $users->count()));

            foreach ($randomUsers as $user) {
                $suggestion->votes()->attach($user->id, [
                    'voted_at' => now()->subDays(rand(0, 30)) // Votos en los últimos 30 días
                ]);
            }
        }
    }
}

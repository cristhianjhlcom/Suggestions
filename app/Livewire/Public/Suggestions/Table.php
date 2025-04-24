<?php

declare(strict_types=1);

namespace App\Livewire\Public\Suggestions;

use App\Enums\SuggestionStatus;
use App\Models\Suggestion;
use Livewire\Component;

final class Table extends Component
{
    public function vote(int $id): void
    {
        // NOTE: Validar el argumento $id.
        dd('vote', $id);
    }

    public function render()
    {
        return view('livewire.public.suggestions.table')
            ->with([
                'suggestions' => Suggestion::whereIn('status', [
                    SuggestionStatus::InProgress,
                    SuggestionStatus::Planning,
                ])
                    ->withCount('votes')
                    ->orderBy('votes_count', 'desc')
                    ->get(),
            ]);
    }
}

<?php

declare(strict_types=1);

namespace App\Livewire\Public\Suggestions;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.public')]
final class Index extends Component
{
    public string $title = 'Suggestions';

    public function render()
    {
        return view('livewire.public.suggestions.index');
    }
}

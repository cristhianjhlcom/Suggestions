<?php

declare(strict_types=1);

namespace App\Livewire;

use Livewire\Component;

final class Counter extends Component
{
    public int $count = 0;

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }

    public function resetCount()
    {
        $this->count = 0;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}

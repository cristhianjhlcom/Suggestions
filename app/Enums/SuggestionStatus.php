<?php

declare(strict_types=1);

namespace App\Enums;

enum SuggestionStatus: string
{
    case Pending = 'pending';
    case Planning = 'planning';
    case InProgress = 'in_progress';
    case Finished = 'finished';

    public function label(): string
    {
        return match ($this) {
            self::Pending => 'Pending',
            self::Planning => 'Planning',
            self::InProgress => 'In Progress',
            self::Finished => 'Finished',
        };
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}

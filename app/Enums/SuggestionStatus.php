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
            self::Pending => __('Pending'),
            self::Planning => __('Planning'),
            self::InProgress => __('In Progress'),
            self::Finished => __('Finished'),
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Pending => 'bg-yellow-600',
            self::Planning => 'bg-red-600',
            self::InProgress => 'bg-blue-600',
            self::Finished => 'bg-green-600',
        };
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}

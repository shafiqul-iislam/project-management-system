<?php

namespace App\Enums;

enum ProjectStatusEnum: string
{
    case PENDING = 'pending';
    case IN_PROGRESS = 'in_progress';
    case COMPLETED = 'completed';
    case CANCELED = 'canceled';

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'Pending',
            self::IN_PROGRESS => 'In Progress',
            self::COMPLETED => 'Completed',
            self::CANCELED => 'Canceled',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::PENDING => 'bg-yellow-100 text-yellow-700',
            self::IN_PROGRESS => 'bg-blue-100 text-blue-700',
            self::COMPLETED => 'bg-green-100 text-green-700',
            self::CANCELED => 'bg-red-100 text-red-700',
        };
    }


    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}

<?php

namespace App\Enums;

enum QuoteRequestStatus: string
{
    case New = 'new';
    case QuoteSent = 'quote_sent';
    case InProgress = 'in_progress';
    case Completed = 'completed';
    case Rejected = 'rejected';

    public function label(): string
    {
        return match ($this) {
            self::New => 'Nieuw',
            self::QuoteSent => 'Offerte verstuurd',
            self::InProgress => 'In behandeling',
            self::Completed => 'Voltooid',
            self::Rejected => 'Afgewezen'
        };
    }
}

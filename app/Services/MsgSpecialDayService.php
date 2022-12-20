<?php

namespace App\Services;

use Carbon\Carbon;

class MsgSpecialDayService
{
    public function checkMessageSpecialDay(Carbon $date): ?string
    {
        $formattedDate = $date->format('d/m');
        return $this->msgSpecialDay($formattedDate);
    }

    private function msgSpecialDay(string $formattedDate): ?string
    {
        return match ($formattedDate) {
            "12/10" => "Children`s Day",
            "24/12" => "Christmas",
            "31/12" => "New Year",
            default => null,
        };
    }
}

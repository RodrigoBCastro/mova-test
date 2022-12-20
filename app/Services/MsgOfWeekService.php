<?php

namespace App\Services;

use Carbon\Carbon;

class MsgOfWeekService
{
    public function checkMessageOfWeek(Carbon $date): string
    {
        $dayOfWeek = $date->dayOfWeek;
        return $this->msgDayOfWeek($dayOfWeek);
    }

    private function msgDayOfWeek(int $day): string
    {
        return match ($day) {
            0 => 'hoje e domingo',  # domingo
            1 => 'hoje e segunda',  # segunda
            2 => 'hoje e terca',    # terca
            3 => 'hoje e quarta',   # quarta
            4 => 'hoje e quinta',   # quinta
            5 => 'hoje e sexta',    # sexta
            6 => 'hoje e sabado',   # sabado
            default => 'Nao ha mensagem',
        };
    }
}

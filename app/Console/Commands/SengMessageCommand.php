<?php

namespace App\Console\Commands;

use App\Services\MsgOfWeekService;
use App\Services\MsgSpecialDayService;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SengMessageCommand extends Command
{
    private MsgOfWeekService $msgOfWeekService;
    private MsgSpecialDayService $msgSpecialDayService;

    public function __construct(
        MsgOfWeekService     $msgOfWeekService,
        MsgSpecialDayService $msgSpecialDayService
    ) {
        parent::__construct();
        $this->msgOfWeekService = $msgOfWeekService;
        $this->msgSpecialDayService = $msgSpecialDayService;
    }

    protected $signature = 'sendMessage';
    protected $description = 'This command send a custom message for special days or day of week';

    public function handle()
    {
        $today = Carbon::now();
        $specialDay = $this->msgSpecialDayService->checkMessageSpecialDay($today);
        $message = $specialDay ?: $this->msgOfWeekService->checkMessageOfWeek($today);

        print($message . "\n");
    }
}

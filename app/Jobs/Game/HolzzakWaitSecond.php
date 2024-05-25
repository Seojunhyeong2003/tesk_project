<?php

namespace App\Jobs\Game;

use App\Events\HolzzakWaitSecondEvent;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class HolzzakWaitSecond implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        Log::debug(Carbon::now()." HolzzakWaitSecond RUN");
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        broadcast(new HolzzakWaitSecondEvent());
    }
}

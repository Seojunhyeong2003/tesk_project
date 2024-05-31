<?php

namespace App\Jobs\Game;

use App\Events\HolzzakWaitSecondEvent;
use Carbon\Carbon;
use Illuminate\Broadcasting\Channel;
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
    public function broadcastOn(): array
    {
        return [
            new Channel('GameHolzzakChannel')
        ];
    }
    public function broadcastWith() :array
    {
        return [
            's' => 1
        ];
    }

    public function broadcastAs()
    {
        return 'gameWaitSecond';
    }
}

<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Ramsey\Uuid\Type\Integer;

class HolzzakWaitSecondEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $connection = 'redis';
    public $lossTimeout;

    public function __construct()
    {
        // Redis에서 남은 시간을 불러옴. 없으면 초기값 60초
        $this->lossTimeout = Cache::get('lossTimeout', 60);
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('holzzak')
        ];
    }
    public function broadcastWith() :array
    {
        $this->lossTimeout -= 5;
        Cache::put('lossTimeout', $this->lossTimeout, 3600);
        return [
            'lossTimeout' => $this->lossTimeout
        ];
    }

    public function broadcastAs()
    {
        return 'holzzak';
    }
}

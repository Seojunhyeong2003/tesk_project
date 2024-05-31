<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;

class HolzzakUserBetting implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $connection = 'redis';
    /**
     * Create a new event instance.
     */
    public $oddEvenForm;
    public String $user;
    public function __construct($oddEvenForm, $user)
    {
        $this->oddEvenForm = $oddEvenForm;
        $this->user = $user->name;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('holzzak')
        ];
    }
    public function broadcastWith() :array
    {
        return [
            'betInfo' => $this->oddEvenForm,
            'user' => $this->user
        ];
    }

    public function broadcastAs()
    {
        return 'bet';
    }
}

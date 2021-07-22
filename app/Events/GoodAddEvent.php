<?php

namespace App\Events;

use App\Models\Good;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class GoodAddEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $good;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Good $good)
    {
        $this->good = $good;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}

<?php
namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ShoutoutAdded extends Event implements ShouldBroadcast
{
    use SerializesModels;

    public $shoutout;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($shoutout)
    {
        $this->shoutout = $shoutout;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['shoutout-added'];
    }

    public function broadcastWith()
    {
        return ['shoutout' => $this->shoutout];
    }
}

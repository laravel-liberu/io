<?php

namespace LaravelLiberu\IO\Events;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\App;
use LaravelLiberu\IO\Enums\IOTypes;
use LaravelLiberu\IO\Http\Resources\IO;

class IOEvent implements ShouldBroadcast
{
    use Dispatchable, SerializesModels;

    public function __construct(private readonly Model $operation)
    {
        $this->broadcastQueue = 'notifications';
    }

    public function broadcastOn()
    {
        $channels = [new PrivateChannel('operations')];

        if ($this->inferiorRole()) {
            $channels[] = new PrivateChannel(
                "operations.{$this->operation->created_by}"
            );
        }

        return $channels;
    }

    public function broadcastWith()
    {
        $this->operation->load('createdBy.avatar', 'createdBy.person');

        return ['operation' => (new IO($this->operation))->resolve()];
    }

    public function broadcastAs()
    {
        return App::make(IOTypes::class)::get($this->operation->operationType());
    }

    private function inferiorRole(): bool
    {
        return ! $this->operation->createdBy?->isSuperior();
    }
}

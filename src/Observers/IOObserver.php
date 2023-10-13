<?php

namespace LaravelLiberu\IO\Observers;

use LaravelLiberu\IO\Contracts\IOOperation;
use LaravelLiberu\IO\Events\IOEvent;

class IOObserver
{
    public function created(IOOperation $operation)
    {
        $this->dispatch($operation);
    }

    public function updated(IOOperation $operation)
    {
        $this->dispatch($operation);
    }

    private function dispatch($operation)
    {
        IOEvent::dispatch($operation);
    }
}

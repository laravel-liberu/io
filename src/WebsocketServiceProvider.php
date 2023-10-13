<?php

namespace LaravelLiberu\IO;

use LaravelLiberu\Core\Facades\Websockets;
use LaravelLiberu\Core\WebsocketServiceProvider as CoreServiceProvider;
use LaravelLiberu\Users\Models\User;

class WebsocketServiceProvider extends CoreServiceProvider
{
    public function boot()
    {
        Websockets::register([
            'io' => fn (User $user) => $user->isAdmin() || $user->isSupervisor()
                ? 'operations'
                : 'operations.'.$user->id,
        ]);
    }
}

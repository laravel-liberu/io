<?php

namespace LaravelLiberu\IO;

use LaravelLiberu\Enums\EnumServiceProvider as ServiceProvider;
use LaravelLiberu\IO\Enums\IOStatuses;
use LaravelLiberu\IO\Enums\IOTypes;

class EnumServiceProvider extends ServiceProvider
{
    public $register = [
        'ioStatuses' => IOStatuses::class,
        'ioTypes' => IOTypes::class,
    ];
}

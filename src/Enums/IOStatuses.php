<?php

namespace LaravelLiberu\IO\Enums;

use LaravelLiberu\Enums\Services\Enum;

class IOStatuses extends Enum
{
    final public const Started = 10;
    final public const Processing = 20;
    final public const Finalized = 30;
}

<?php

namespace LaravelEnso\IO\Enums;

use LaravelEnso\Enums\Services\Enum;

class IOStatuses extends Enum
{
    final public const Started = 10;
    final public const Processing = 20;
    final public const Finalized = 30;
}

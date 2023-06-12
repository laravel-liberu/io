<?php

namespace LaravelEnso\IO\Enums;

use LaravelEnso\Enums\Services\Enum;

class IOTypes extends Enum
{
    final public const Import = 1;
    final public const Export = 2;
    final public const Task = 3;

    protected static array $data = [
        self::Import => 'import',
        self::Export => 'export',
        self::Task => 'task',
    ];
}

<?php

declare(strict_types=1);

namespace Talbergs;

use Revolt\EventLoop;

final class Server
{
    public static function aaa()
    {
        echo 333;
    }

    public static function boot()
    {
        // register stream reader that casts requests into calls.
        EventLoop::onReadable(STDIN, fn ($a) => Events::gotMessage($a));
        EventLoop::defer(fn () => Events::gotMessage("a"));
    }
}

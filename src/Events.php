<?php

declare(strict_types=1);

namespace Talbergs;

final class Events
{
    public static function gotMessage(string $json)
    {
        echo "($json)";
    }
}

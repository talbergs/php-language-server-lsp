<?php

declare(strict_types=1);

namespace Talbergs;

final class Diode
{
    private static $callbacks = [];
    private static $stack = [];

    public static function accept(int $id, string $method, mixed $params): void
    {
        array_push(static::$stack, [$id, $method, $params]);
    }

    public static function register(string $method, callable $callback): void
    {
        static::$callbacks[$method] = $callback;
    }

    public static function receive(): array
    {
        if ([$id, $method, $params] = array_pop(static::$stack)) {
            return [$id, static::$callbacks[$method]($params)];
        }

        return [null, null];
    }
}

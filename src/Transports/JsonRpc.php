<?php

declare(strict_types=1);

namespace Talbergs\Transports;

class JsonRpc
{
    private static array $sequence = [];

    public static function notify(string $method, array $params): string
    {
        return json_encode([
            'method' => $method,
            'params' => $params,
            'jsonrpc' => '2.0',
        ]);
    }

    private static function nextId(): int
    {
        return 1 + key(self::$sequence);
    }

    public static function request(array $body): string
    {
        return json_encode([
            'id' => self::nextId(),
            'params' => $body,
            'jsonrpc' => '2.0',
        ]);
    }

    public static function respond(int $id, array $body): string
    {
        return json_encode([
            'id' => $id,
            'result' => $body,
            'jsonrpc' => '2.0',
        ]);
    }

    public static function recv(string $json): array
    {
        $data = json_decode($json, true);
        if (array_key_exists('id', $data)) {
            self::$sequence[(int) $data['id']] = null;
            ksort(self::$sequence);
            end(self::$sequence);
        }

        return $data;
    }
}

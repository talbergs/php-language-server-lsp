<?php

declare(strict_types=1);

namespace Talbergs\Transports;

final class HTTP
{
    private static string $buffer = '';
    private static int $toReceive = 0;

    public static function recv(string $streamChunk): \Generator
    {
        if (!$streamChunk) {
            return;
        }

        if (static::$toReceive === 0) {
            static::$buffer = '';
            return yield from static::recv(static::consumeHeader($streamChunk));
        }

        $arrivedLen = strlen($streamChunk);

        if ($arrivedLen < static::$toReceive) {
            static::$toReceive -= $arrivedLen;
            static::$buffer = static::$buffer . $streamChunk;
            return;
        }

        if ($arrivedLen > static::$toReceive) {
            $lastSegment = substr($streamChunk, 0, static::$toReceive);
            $nextSegment = substr($streamChunk, static::$toReceive);

            yield static::$buffer . $lastSegment;

            static::$toReceive = 0;
            return yield from static::recv($nextSegment);
        }

        static::$toReceive = 0;
        yield static::$buffer . $streamChunk;
    }

    private static function consumeHeader(string $streamChunk): string
    {
        $headerLen = stripos($streamChunk, "\r\n\r\n") + 4;
        $headers = substr($streamChunk, 0, $headerLen);
        preg_match('/Content-Length: (?<length>\d+)/i', $headers, $mathces);
        static::$toReceive = (int) $mathces['length'];

        return substr($streamChunk, $headerLen);
    }

    public static function send(string $body): string
    {
        $jj = json_decode($body,true);
        ksort($jj);
        l((isset($jj['id']) ? '-<< ' : '--< ').json_encode($jj));

        $length = strlen($body);
        return "Content-Length: {$length}\r\n\r\n{$body}\r\n";
    }
}

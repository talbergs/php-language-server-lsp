<?php

declare(strict_types=1);

namespace Talbergs\Transports;

final class HTTP
{
    private static string $buffer = '';
    private static int $received = 0;
    private static int $toReceive = 0;

    public static function recv(string $streamChunk): \Generator
    {
        if (!$streamChunk) {
            return;
        }

        if (static::$toReceive === 0) {
            // open buffer, find content length
        } else {
            $streamChunk;
            // read needed bytes.
        }

        // return yield from static::recv($streamChunk);

        // return explode("\r\n\r\n", $body)[1];
        $j = explode("\r\n\r\n", $streamChunk)[1];
        // $j = mb_convert_encoding($j, 'ISO-8859-1', 'UTF-8');
        // l($j);
        // $jj = json_decode($j,true);

        // ksort($jj);
        // l((isset($jj['id']) ? '>>- ' : '>-- ').json_encode($jj));
        yield $j;
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

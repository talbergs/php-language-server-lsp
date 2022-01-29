<?php

declare(strict_types=1);

namespace Talbergs\Transports;

final class HTTP
{
    public static function recv(string $body): string
    {
        // return explode("\r\n\r\n", $body)[1];
        $j = explode("\r\n\r\n", $body)[1];
        $jj = json_decode($j,true);
        ksort($jj);
        l((isset($jj['id']) ? '>>- ' : '>-- ').json_encode($jj));
        return $j;
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

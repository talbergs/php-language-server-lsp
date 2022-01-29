<?php

declare(strict_types=1);

namespace Talbergs\Transports;

use Talbergs\LSP\DTO;

class LSP
{
    private array $sequence;

    public static function recv(string $json): array
    {
        $data = json_decode($json, true);
        if (array_key_exists('id', $data)) {
            $sequence[$data['id']] = $data;
        }

        return $data['params'];
        dd($data);
        // decode?:fail
        // ID-sequence?:fail
        // echo "($json)";
    }
}

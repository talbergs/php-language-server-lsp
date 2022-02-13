<?php

declare(strict_types=1);

namespace Talbergs\Transports;

use PHPUnit\Framework\TestCase;

class HTTPTest extends TestCase
{
    public function assertRecvChunks(array $chunks, array $expect)
    {
        $actual = [];

        foreach ($chunks as $chunk) {
            $actual = [...$actual, ...iterator_to_array(HTTP::recv($chunk))];
        }

        if ($chunks) {
            $this->assertEquals($actual, $expect);
        }
    }

    public function testStreamReveiveEmpty()
    {
        $this->assertRecvChunks([''], []);
    }

    public function testStreamReveiveExact()
    {
        $this->assertReceive("Content-length: 10\r\n\r\n0123456789", ['0123456789']);
    }

    public function testStreamReveiveBuffered()
    {
        $this->assertReceive("Content-length: 10\r\n\r\n012345678", []);
        $this->assertReceive("9", ['0123456789']);
    }
}

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
            $actual = [...$actual, ...iterator_to_array(HTTP::recv($chunk), false)];
        }

        if ($chunks) {
            $this->assertEquals($expect, $actual);
        }
    }

    public function testStreamReveiveEmpty()
    {
        $this->assertRecvChunks([''], []);
    }

    public function testStreamReveiveExact()
    {
        $this->assertRecvChunks(["X-client: vi\r\nContent-length: 10\r\n\r\n0123456789"], ['0123456789']);
        $this->assertRecvChunks(["Content-length: 10\r\n\r\n0123456789"], ['0123456789']);
    }

    public function testStreamReveiveEmptyThenExact()
    {
        $this->assertRecvChunks(['', "Content-length: 10\r\n\r\n0123456789"], ['0123456789']);
    }

    public function testStreamReveiveForeignHeaders()
    {
        $this->assertRecvChunks(["X-client: vi\r\nContent-length: 10\r\n\r\n0123456789"], ['0123456789']);
    }

    public function testStreamReveiveOneInChunks()
    {
        $this->assertRecvChunks(["Content-length: 10\r\n\r\n012345678", '9'], ['0123456789']);
    }

    public function testStreamReveiveManyInOneChunk()
    {
        $this->assertRecvChunks(
            [str_repeat("Content-length: 10\r\n\r\n0123456789", 3)],
            ['0123456789', '0123456789', '0123456789'],
        );
    }

}
